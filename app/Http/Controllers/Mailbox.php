<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

Use Auth;
Use DB;
use App\User;
use App\Listings;
use Carbon\Carbon;

class Mailbox extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // make sure no guests

        $this->user_id = 585;
        if(Auth::user()){
          $this->user_id = Auth::user()->id;
          $this->user_role = Auth::user()->role;
        }
    }

    public function index() {

        $page = isset($_GET['page']) && !empty($_GET['page']) ? intval($_GET['page']) : 0;
        $size= isset($_GET['size']) && !empty($_GET['size']) ? intval($_GET['size']) : 10;

        // $messages = DB::table('conversations')
        // // ->where('readAt', NULL)
        // ->where('toUserId', $this->user_id)
        // ->join('users AS sender', 'conversations.fromUserId', '=', 'sender.id' )
        // ->Join('users AS receiver', 'conversations.toUserId', '=', 'receiver.id')
        // ->join('listings', 'listings.id', '=', 'conversations.listingId')
        // ->orderby('sentAt', 'desc')
        // ->groupBy('fromUserId')
        // ->groupBy('listingId')
        // ->skip($page*$size)
        // ->take($size)
        // ->select('conversations.*', 'listings.id', 'listings.title', 'sender.companyLogoUrl As senderCompanyLogoUrl','sender.id AS senderId', 'sender.firstName AS senderFirstName', 'sender.email AS senderEmail', 'receiver.id AS receiverId', 'receiver.firstName AS receiverFirstName', 'receiver.email AS receiverEmail', 'receiver.companyLogoUrl As receiverCompanyLogoUrl')
        // ->get();

        $mailbox = DB::table('conversations')
        ->where('readAt', NULL)
        ->where('toUserId', $this->user_id)
        ->orWhere('fromUserId', $this->user_id)
        ->select('id')
        ->get();

        // return response()->json($mailbox);

        if(count($mailbox) > 0) {
            $message_id = array();
            foreach($mailbox as $mail){
                $message_id[] = $mail->id;
            }
            // return response()->json($mailbox);
            $messages = DB::table('conversations')
            ->join('users AS sender', 'conversations.fromUserId', '=', 'sender.id' )
            ->Join('users AS receiver', 'conversations.toUserId', '=', 'receiver.id')
            ->join('listings', 'listings.id', '=', 'conversations.listingId')
            ->orderby('sentAt', 'desc')
            ->groupBy('fromUserId')
            ->groupBy('listingId')
            ->whereIn('conversations.id', $message_id)
            ->skip($page*$size)
            ->take($size)
            ->select('conversations.*', 'listings.id', 'listings.title', 'sender.companyLogoUrl As senderCompanyLogoUrl','sender.id AS senderId', 'sender.firstName AS senderFirstName', 'sender.email AS senderEmail', 'receiver.id AS receiverId', 'receiver.firstName AS receiverFirstName', 'receiver.email AS receiverEmail', 'receiver.companyLogoUrl As receiverCompanyLogoUrl')
            ->get();

            echo json_encode((object) ['result' => 1, 'messages' => $messages]);
        } else {
            echo json_encode((object) ['result' => 0, 'message' => 'You don\'t have any message yet.']);
        }
    }

    function conversation() {
      $page = isset($_POST['page']) && !empty($_POST['page']) ? intval($_POST['page']) : 0;
      $size= isset($_POST['size']) && !empty($_POST['size']) ? intval($_POST['size']) : 10;
      $otherId= isset($_POST['otherId']) && !empty($_POST['otherId']) ? intval($_POST['otherId']) : NULL;
      $listingId= isset($_POST['listingId']) && !empty($_POST['listingId']) ? intval($_POST['listingId']) : NULL;

      $messages = DB::table('conversations')
        ->where(function ($query) use ($otherId) {
          $query->orWhere('toUserId', '=', $this->user_id)
           ->orWhere('toUserId', '=', $otherId);
        })
        ->where(function ($query) use ($otherId) {
          $query
           ->orWhere('fromUserId', '=', $this->user_id)
           ->orWhere('fromUserId', '=', $otherId);
        })
        ->where('listingId', $listingId)
        ->orderby('sentAt', 'desc')
        ->skip($page*$size)
        ->take($size)
        ->get();

        if($messages) {
          $otherUser = DB::table('users')
            ->where('id', $otherId)
            ->select('id', 'email', 'companyLogoUrl', 'firstName')
            ->first();
          $dealer= DB::table('users')
            ->where('id', $this->user_id)
            ->select('id', 'email', 'companyLogoUrl', 'firstName')
            ->first();

          echo json_encode((object) ['result' => 1, 'users' => ['other'=>$otherUser, 'dealer' =>$dealer], 'messages' => $messages]);
        } else {
          echo json_encode((object) ['result' => 0, 'message' => 'You don\'t have any message yet.']);
        }
    }
    function sendMessage() {
      $toUserId = isset($_POST['toUserId']) && !empty($_POST['toUserId']) ? intval($_POST['toUserId']) : NULL;
      $listingId = isset($_POST['listingId']) && !empty($_POST['listingId']) ? intval($_POST['listingId']) : NULL;
      $content= isset($_POST['content']) && !empty($_POST['content']) ? $_POST['content'] : NULL;
      if ($toUserId && $listingId && $content) {
        $insertArr = [
          'toUserId' => $toUserId,
          'listingId' => $listingId,
          'fromUserId' => $this->user_id,
          'body' => $content,
          'sentAt' => Carbon::now()
        ];
        $newId = DB::table('conversations')->insert($insertArr);
        $insertArr['id'] = $newId;
        echo json_encode((object) ['result'=> 1, 'newMessage'=> $insertArr]);
      } else {
        echo json_encode((object) ['result'=> 0, 'message'=> 'You haven\'t supplied enough parameters.']);
      }
    }
}
