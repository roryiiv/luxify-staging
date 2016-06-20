<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Panel extends Controller
{
    //Panel (super admin) Controller
    public function index() {
        // return 'panel index page';
        return view('welcome');
    }

    public function users() {
        return 'users management page';
    }

    public function user_add() {
        return 'users add page';
    }

    public function user_confirm() {
        return 'users confirm method';
    }

    public function user_edit() {
        return 'users edit page';
    }

    public function user_delete($user_id) {
        return 'users delete methos';
    }

    public function products() {
        return 'products management page';
    }

    public function products_add() {
        return 'products add page';
    }

    public function products_confirm() {
        return 'products confirm method';
    }

    public function products_edit() {
        return 'products edit page';
    }

    public function products_delete($id) {
        return 'products delete methos';
    }
}
