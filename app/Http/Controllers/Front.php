<?php

namespace App\Http\Controllers;

use App\listings;
use App\Categories;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Auth;

use DB;
use Illuminate\Routing\Controller;

class Front extends Controller {
    //Front end Controller
    public function index() {
        // return 'index page';
        $listings = DB::table('listings')->orderBy('created_at', 'desc')->take(8)->get();
        return view('index', ['listings' => $listings]);
    }

    public function products() {
        $listings = DB::table('listings')->orderBy('created_at', 'desc')->paginate(16);
        return view('listings', ['listings' => $listings]);
    }

    public function product_details($id) {
        return 'product details page' . $id;
    }

    public function categories() {
        return 'product categories page';
    }

    public function product_categories($id) {
        $cat = DB::table('categories')
        ->where('slug',$id)
        ->first();
        // var_dump($cat);
        $catID = $cat->id;
        $listings = DB::table('listings')
        ->where('categoryId', $catID)
        ->paginate(16);
        return view('category', ['cat' => $cat, 'listings' => $listings]);
    }

    public function product_brands($name) {
        return 'product brands page';
    }

    public function contact_us() {
        return 'contact us page';
    }
    public function register() {
      return view('auth.register');
    }
    public function login() {
        return view('auth.login');
    }

    public function search() {
        $search = \Request::get('search');
        $search = urldecode($search);

        $search_arr = array();
        $search_arr[] = ['title','like','%'.$search.'%'];
        $search_arr[] = ['description','like','%'.$search.'%'];

        // var_dump($search_arr);

        $listings = DB::table('listings')
        ->where($search_arr)
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        $listings->setPath('?search='.$search);

        return view('search', ['listings' => $listings, 'search' => $search]);
    }
}
