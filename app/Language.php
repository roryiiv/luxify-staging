<?php

namespace App;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Auth;
use DB;

class Language extends Model
{
    public static function updatelang($val){
        $code = DB::table('languages')->where('id',$val)->value('code');
    	if(Auth::user()){
            $update = DB::table('users')->where('id',Auth::user()->id)->update(['languageId'=>$val]);
            Session::put('lang', $code);
    	}else{
    		return Session::put('lang', $code);
    	}
    }
}
