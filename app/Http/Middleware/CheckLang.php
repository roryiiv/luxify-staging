<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Auth;
use DB;

class CheckLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()){
            $languageId = Auth::user()->languageId;
            if($languageId !='' && !empty($languageId)){
                $lang = DB::table('languages')->where('id',$languageId)->value('code');
            }else{
                if(Session::has('lang')){
                    $lang = Session::get('lang');
                }else{
                    $lang = Config::get('app.locale');                  
                }
            }
            App::setLocale($lang);
        }else{
            App::setLocale(Session::has('lang') ? Session::get('lang') : Config::get('app.locale'));
        }
        return $next($request);
    }
}
