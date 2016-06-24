<?php

namespace App\Http\Controllers;

use App\User;
use App\Country;

Use Auth;

use Illuminate\Http\Request;

// use Illuminate\Contracts\Filesystem\Filesystem;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

use App\Http\Requests;

Use DB;

class Dashboard extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // make sure no guests

        $this->user_id = 585;
        if(Auth::user()){
            $this->user_id = Auth::user()->id;
            $this->user_role = Auth::user()->role;
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if($this->user_role == 'seller'){
            return view('dashboard.home');
        }elseif($this->user_role == 'user'){
            return redirect('/dashboard/profile');
        }else{
            return redirect('/panel/users');;
        }
    }

    public function profile() {
        $user = User::where('id', $this->user_id)->first();
        // var_dump($user);
        return view('dashboard.profile', ['user' => $user]);
    }

    public function profile_update() {
        $user = User::where('id', $this->user_id)->first(); // always have it declared for first or else empty value sent

        //we push the image to S3 first.
        if(isset($_POST['cover_img']) && !empty($_POST['cover_img'])){
            $image = base_path() . '/public/temp/' . $_POST['cover_img'];
            $s3 = \Storage::disk('s3');
            $filePath = '/images/' . $_POST['cover_img'];
            if($s3->put($filePath, file_get_contents($image), 'public')){
                $user->coverImageUrl = $_POST['cover_img'];
                unlink($image);
            }
        }
        if(isset($_POST['profile_img']) && !empty($_POST['profile_img'])){
            $image = base_path() . '/public/temp/' . $_POST['profile_img'];
            $s3 = \Storage::disk('s3');
            $filePath = '/images/' . $_POST['profile_img'];
            if($s3->put($filePath, file_get_contents($image), 'public')){
                $user->companyLogoUrl = $_POST['profile_img'];
                unlink($image);
            }
        }


        $error_arr = array();
        if((isset($_POST['txtPassword']) && !empty($_POST['txtPassword'])) && (isset($_POST['txtConfirmPassword']) && !empty($_POST['txtConfirmPassword']))){
            if($_POST['txtPassword'] == $_POST['txtConfirmPassword']) {
                $error_arr['password'] = 'not yet implemented for updates.';
            }else{
                $error_arr['password'] = 'password not matching.';
            }
        }
        if(isset($_POST['first_name']) && !empty($_POST['first_name'])){
            $user->firstName = $_POST['first_name'];
        }
        if(isset($_POST['last_name']) && !empty($_POST['last_name'])){
            $user->lastName = $_POST['last_name'];
        }
        if(isset($_POST['']) && !empty($_POST[''])){
            $user->lastName = $_POST['last_name'];
        }
        if(isset($_POST['']) && !empty($_POST[''])){
            $user->lastName = $_POST['last_name'];
        }
        if(isset($_POST['country']) && !empty($_POST['country'])){
            $user->countryId = $_POST['country'];
        }
        if(isset($_POST['language']) && !empty($_POST['language'])){
            $user->languageId = $_POST['language'];
        }
        if(isset($_POST['currency']) && !empty($_POST['currency'])){
            $user->currencyId = $_POST['currency'];
        }
        if(isset($_POST['contactDetails']) && !empty($_POST['contactDetails'])){
            $user->contactDetails = $_POST['contactDetails'];
        }
        if(isset($_POST['companyAddress']) && !empty($_POST['companyAddress'])){
            $user->companyAddress = $_POST['companyAddress'];
        }
        if(isset($_POST['latitude']) && !empty($_POST['latitude'])){
            $user->latitude = $_POST['latitude'];
        }
        if(isset($_POST['longitude']) && !empty($_POST['longitude'])){
            $user->longitude = $_POST['longitude'];
        }
        if(isset($_POST['mapZoomLevel']) && !empty($_POST['mapZoomLevel'])){
            $user->mapZoomLevel = $_POST['mapZoomLevel'];
        }
        if(isset($_POST['companyName']) && !empty($_POST['companyName'])){
            $user->companyName = $_POST['companyName'];
        }
        if(isset($_POST['companyRegNumber']) && !empty($_POST['companyRegNumber'])){
            $user->companyRegNumber = $_POST['companyRegNumber'];
        }
        if(isset($_POST['companySummary']) && !empty($_POST['companySummary'])){
            $user->companySummary = $_POST['companySummary'];
        }
        if(isset($_POST['website']) && !empty($_POST['website'])){
            $user->website = $_POST['website'];
        }
        if(isset($_POST['txtFacebookLink']) && !empty($_POST['txtFacebookLink'])){
            $user->socialFacebook = $_POST['txtFacebookLink'];
        }
        if(isset($_POST['txtInstagramLink']) && !empty($_POST['txtInstagramLink'])){
            $user->socialInstagram = $_POST['txtInstagramLink'];
        }
        if(isset($_POST['txtPinterestLink']) && !empty($_POST['txtPinterestLink'])){
            $user->socialPinterest = $_POST['txtPinterestLink'];
        }
        if(isset($_POST['txtTwitterLink']) && !empty($_POST['txtTwitterLink'])){
            $user->socialTwitter = $_POST['txtTwitterLink'];
        }
        if(!empty($error_arr)){
            $error = json_encode($error_arr);
            echo $error;
        }else{
            if($user->save()) return redirect('/dashboard/profile');
        }

    }

    public function products_add() {
      return view('dashboard.products_add'); 
    }

    public function products_edit() {
    
    }

    public function wishlist() {
        $filter = array();
        $filter[] = ['wishlists.userId', $this->user_id];
        $filter[] = ['deleted', 0];
        if(isset($_GET['txtProductName']) && !empty($_GET['txtProductName'])){
            $filter[] = ['listings.title', 'like', $_GET['txtProductName']];
        }
        if(isset($_GET['txtPrice']) && !empty($_GET['txtPrice'])){
            $filter[] = ['listings.price', $_GET['txtPrice']];
        }
        if(isset($_GET['startDate']) && !empty($_GET['startDate'])){
            $setDate = $_GET['startDate'];

            $a = date('Y-m-d H:i:s', strtotime($setDate));
            $b = date('Y-m-d H:i:s', strtotime($setDate . ' +1 day'));
            $filter[] = ['wishlists.createdAt', '>=', $a];
            $filter[] = ['wishlists.createdAt', '<=', $b];
        }
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $filter[] = ['listings.status', $_GET['status']];
        }
        $wishes = DB::table('wishlists')
        ->join('listings', 'wishlists.listingId','=', 'listings.id')
        ->select('listings.id', 'listings.title', 'wishlists.createdAt', 'listings.mainImageUrl', 'listings.price', 'listings.status')
        ->where($filter)
        ->orderby('wishlists.createdAt', 'asc')
        ->paginate(10);

        // var_dump($wishes);
        $wishes->setPath($_SERVER['REQUEST_URI']);
        return view('dashboard.wishlist', ['wishes' => $wishes]);
    }

    public function products() {
        if($this->user_role != 'seller') return redirect('/');
        $filter = array();
        $filter[] = ['listings.userId', $this->user_id];
        if(isset($_GET['txtProductName']) && !empty($_GET['txtProductName'])){
            $filter[] = ['listings.title', 'like', $_GET['txtProductName']];
        }
        if(isset($_GET['txtPrice']) && !empty($_GET['txtPrice'])){
            $filter[] = ['listings.price', $_GET['txtPrice']];
        }
        if(isset($_GET['startDate']) && !empty($_GET['startDate'])){
            $setDate = $_GET['startDate'];

            $a = date('Y-m-d H:i:s', strtotime($setDate));
            $b = date('Y-m-d H:i:s', strtotime($setDate . ' +1 day'));
            $filter[] = ['listings.created_at', '>=', $a];
            $filter[] = ['listings.created_at', '<=', $b];
        }
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $filter[] = ['listings.status', $_GET['status']];
        }
        $products = DB::table('listings')
        ->where($filter)
        ->orderby('listings.created_at', 'asc')
        ->paginate(10);

        // var_dump($wishes);
        $products->setPath($_SERVER['REQUEST_URI']);
        return view('dashboard.products', ['products' => $products]);
    }

    public function mailbox() {
        $conv = DB::table('conversations')
        ->where('toUserId', $this->user_id)
        ->where('parentId', NULL)
        ->where('readAt', NULL)
        ->orderby('sentAt', 'desc')
        ->paginate(10);

        return view('dashboard.mailbox', ['conv', $conv]);
    }

    public function single_upload(Request $request) {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                //Image is valid and exist
                $imageTempName = $request->file('image')->getClientOriginalName();
                $ext = pathinfo($imageTempName, PATHINFO_EXTENSION);
                $timestamp = date("Ymd-His");
                $upload_path = base_path() . '/public/temp/';
                $filename = $timestamp . '-luxify-' . Auth::user()->id .'.'. $ext;
                $moved_path = $upload_path . $filename;
                $request->file('image')->move($upload_path, $filename);
                return response()->json($filename);
            }
        }
    }
}
