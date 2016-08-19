<?php

namespace App;
use Auth;
use DB;
use App\Users;
use Carbon\Carbon;
use Request;
use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    protected $table = 'wishlists';
    public $timestamps = false;

    public static function get_dealer_item(){

//        $userId = 585;
        if(Auth::user()){
			$userId = Auth::user()->id;
        }
        $all_wishlist = Wishlists::where('userId',$userId)->count();
        return $all_wishlist;
    }
}
