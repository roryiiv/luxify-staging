<?php

namespace App\Http\Controllers;

use App\User;

Use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

Use DB;

class Dashboard extends Controller
{
    public function __construct() {
        $this->user_id = 585;
        if(Auth::user()){
            $this->user_id = Auth::user()->id;
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function profile() {
        $user = User::where('id', $this->user_id)->first();
        // var_dump($user);
        return view('profile', ['user' => $user]);
    }

    public function profile_update() {
        // var_dump($_POST);
        $user = User::where('id', $this->user_id)->first();

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
            if($user->save()) return redirect('dashboard/profile');
        }

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
        return view('wishlist', ['wishes' => $wishes]);
    }
}
