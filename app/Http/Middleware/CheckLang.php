<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Stevebauman\Translation\Facades\Translation;
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
                if(Translation::getRoutePrefix()==null){
                    $lang = Config::get('app.locale');
                }else{
                    $lang = DB::table('languages')->where('lang_str',Translation::getRoutePrefix())->value('code');
                }
            }
            App::setLocale($lang);
        }else{
            $ganti = DB::table('languages')->where('lang_str',Translation::getRoutePrefix())->value('code');

            App::setLocale(Translation::getRoutePrefix()!=null ? $ganti : Config::get('app.locale'));
        }
        return $next($request);
    }
}
    
