<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

Use Auth;
Use DB;
use App\User;
use App\Listings;
use Carbon\Carbon;
use func;

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

        $selfId = $this->user_id;
         $messages = DB::table('conversations')
         // ->where('readAt', NULL)
         ->where('conversations.deleted', false)
         ->where(function ($query) use ($selfId) {
            $query->orWhere('toUserId', '=', $selfId) 
              ->orWhere('fromUserId', '=', $selfId);
         })
         ->join('users AS sender', 'conversations.fromUserId', '=', 'sender.id')
         ->join('users AS receiver', 'conversations.toUserId', '=', 'receiver.id')
         //->leftJoin('conversations AS c2', function($join) {
         //  $join->on('conversations.hashedId', '=', 'c2.hashedId');
         //  $join->on('conversations.id', '<', 'c2.id');
         //})
         ->leftJoin('listings', 'listings.id', '=', 'conversations.listingId')
         ->groupBy('conversations.hashedId')
         ->orderBy('conversations.sentAt', 'desc')
         ->skip($page*$size)
         ->take($size)
         ->select('conversations.*', 'listings.id as listingTableId', 'listings.title as listingTitle', 'sender.companyLogoUrl As senderCompanyLogoUrl','sender.id AS senderId', 'sender.firstName AS senderFirstName', 'sender.email AS senderEmail', 'receiver.id AS receiverId', 'receiver.firstName AS receiverFirstName', 'receiver.email AS receiverEmail', 'receiver.companyLogoUrl As receiverCompanyLogoUrl')
         ->get();

       if (count($messages)) {
            echo json_encode((object) ['result' => 1, 'messages' => $messages]);
        } else {
            echo json_encode((object) ['result' => 0, 'message' => 'You don\'t have any message yet.']);
        }
    }

    public function conversation() {
        $page = isset($_POST['page']) && !empty($_POST['page']) ? intval($_POST['page']) : 0;
        $size= isset($_POST['size']) && !empty($_POST['size']) ? intval($_POST['size']) : 10;
        $otherId = isset($_POST['otherId']) && !empty($_POST['otherId']) ? intval($_POST['otherId']) : NULL;
        $listingId = isset($_POST['listingId']) && !empty($_POST['listingId']) ? intval($_POST['listingId']) : 0;

        // return response()->json($listingId);

        $messages = DB::table('conversations')
        /*
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
        */

        //first calculate two users id then combine with listingId, this order matters!
        ->where('hashedId', func::hashedId(func::hashedId($this->user_id, $otherId), $listingId))
        ->where('deleted', false)
        ->orderby('sentAt', 'desc')
        ->skip($page*$size)
        ->take($size)
        ->get();

        if($messages) {
            $otherUser = DB::table('users')
            ->where('id', $otherId)
            ->select('id', 'email', 'companyLogoUrl', 'firstName')
            ->first();

            $dealer = DB::table('users')
            ->where('id', $this->user_id)
            ->select('id', 'email', 'companyLogoUrl', 'firstName')
            ->first();

            $readDate = date("Y-m-d H:i:s");
            DB::table('conversations')
            ->where('fromUserId', $otherId)
            ->where('toUserId', Auth::user()->id)
            ->where('listingId', $listingId)
            ->update(['readAt' => $readDate]);

            echo json_encode((object) ['result' => 1, 'users' => ['other'=>$otherUser, 'dealer' =>$dealer], 'messages' => $messages]);
        } else {
            echo json_encode((object) ['result' => 0, 'message' => 'You don\'t have any message yet.']);
        }
    }

    function sendMessage() {
      $toUserId = isset($_POST['toUserId']) && !empty($_POST['toUserId']) ? intval($_POST['toUserId']) : NULL;

      $listingId = isset($_POST['listingId']) ? intval($_POST['listingId']) : NULL;
      $content= isset($_POST['content']) && !empty($_POST['content']) ? $_POST['content'] : NULL;
      if ($toUserId && $listingId !== NULL && $content) {
        $insertArr = [
          'toUserId' => $toUserId,
          'listingId' => $listingId,
          'fromUserId' => $this->user_id,
          'body' => $content,
          'sentAt' => Carbon::now(),
          'hashedId' => func::hashedId(func::hashedId($toUserId, $this->user_id), $listingId)
        ];
        $newId = DB::table('conversations')->insert($insertArr);
        $insertArr['id'] = $newId;
        echo json_encode((object) ['result'=> 1, 'newMessage'=> $insertArr]);
      } else {
        echo json_encode((object) ['result'=> 0, 'message'=> 'You haven\'t supplied enough parameters.']);
      }
    }
    
    function deleteMessage() {
        $msgsToDelete = isset($_POST['msgsToDelete']) && !empty($_POST['msgsToDelete']) ? $_POST['msgsToDelete'] : NULL;
        if ($msgsToDelete) {
            $query = DB::table('conversations');
            foreach($msgsToDelete as $msg) {
                $query->orWhere('hashedId', $msg); 
            }
            $result = $query->update(['deleted' => 1 ]);
            if ($result > 0 ) {
                echo json_encode((object) ['result' => 1, 'numOfDeleted' =>$result]);
            } else {
                echo json_encode((object) ['result' => 0, 'message' => 'No conversations are deleted.']);
            }
        } else {
            echo json_encode((object) ['result'=> 0, 'message'=> 'Please supply enough parameters.']);
        }
    }
    function searchMessage() {
    
    }
}
