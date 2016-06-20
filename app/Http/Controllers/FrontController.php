<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    //Front end Controller
    public function index() {
        // return 'index page';
        return view('welcome');
    }

    public function products() {
        return 'products page';
    }

    public function product_details($id) {
        return 'product details page';
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

    public function search($query) {
        return "$query search page";
    }
}
