<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Auth;

use DB;
use Illuminate\Routing\Controller;
use App\listings;

class Front extends Controller {
    //Front end Controller
    public function index() {
        // return 'index page';
        $listings = DB::table('listings')->orderBy('createdAt', 'desc')->paginate(16);
        return view('welcome', ['listings' => $listings]);
    }

    public function products() {
        $listings = DB::table('listings')->orderBy('createdAt', 'desc')->paginate(16);
        return view('listings', ['listings' => $listings]);
    }

    public function product_details($id) {
        return 'product details page';
    }

    public function categories() {
        return 'product categories page';
    }

    public function product_categories($id) {
        return 'product categories page';
    }

    public function product_brands($name) {
        return 'product brands page';
    }

    public function contact_us() {
        return 'contact us page';
    }

    public function login() {
        return view('login');
    }

    public function logout() {
        return 'logout page';
    }

    public function search() {
        $search = \Request::get('search');
        $search = urldecode($search);

        $listings = DB::table('listings')
        ->where('description','like','%'.$search.'%')
        ->where('description','like','%'.$search.'%')
        ->orderBy('createdAt', 'desc')
        ->paginate(8);
        $listings->setPath('?search='.$search);

        return view('search', ['listings' => $listings, 'search' => $search]);
    }
}
