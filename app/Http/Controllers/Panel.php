<?php

namespace App\Http\Controllers;

use App\Categories;

use App\Listings;

use DB;

use \Cviebrock\EloquentSluggable\Services\SlugService;

use Illuminate\Http\Request;

use App\Http\Requests;

class Panel extends Controller
{


    //Panel (super admin) Controller
    public function index() {
        // return 'panel index page';
        return 'welcome to panel area';
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

    public function cat_rebuild() {
        $cats = Categories::all();
        // var_dump($cats);

        foreach($cats as $cat){
            if(empty($cat->slug)){
                $slug = SlugService::createSlug(Categories::class, 'slug', $cat->title);
                $cat->slug = $slug;
                if($cat->save()){
                    echo $slug . '<br />';
                }else{
                    echo 'Booommmmm !!! <br />';
                }
            }else{
                echo 'Already has slug <br />';
            }
        }
    }

    public function listing_rebuild() {
        $cats = Categories::where('parentId', '<>', NULL)->get();
        // var_dump($cats);

        foreach($cats as $cat){
            $lists = Listings::where('categoryId', $cat->id)->get();
            var_dump($lists);
            echo '<br>------------<br>';
        }

//        foreach($cats as $cat){
//            $slug = SlugService::createSlug(Categories::class, 'slug', $cat->title);
//            $cat->slug = $slug;
//            if($cat->save()){
//                echo $slug;
//            }else{
//                echo 'Booommmmm !!!';
//            }
//        }
        // return 'Categories rebuild';
    }
}
