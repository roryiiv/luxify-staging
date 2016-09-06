<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Stevebauman\Translation\Facades\Translation;
use Illuminate\Http\Request;
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
                $languages = DB::table('languages')->where('id',$languageId)->first();
                $lang_str = $languages->lang_str;
//				$lang = $languages->code;
				$lang = DB::table('languages')->where('lang_str',Translation::getRoutePrefix())->value('code');
                //auto setprefix when log in
/*                if(Translation::getRoutePrefix()!=$lang_str && $lang_str!='en'){
                    $getredirect =  $this->switchLanguage($request,$languages->id);
                    return redirect($getredirect);
                }*/
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
     function switchLanguage($request, $code){
        $code = DB::table('languages')->where('id',$code)->value('lang_str');
        if($code=='en'){
            $langcode='';
        }else{
            $langcode=$code.'/';
        }
        $full_url = $request->header();
        $host = 'http://'.$full_url['host'][0].'/';
        $path = ($request->path()=='/')?'':$request->path();
        $referer = $host.$path;
        $get = DB::table('languages')->get();
        foreach ($get as $key) {
            $referer = str_replace($host.$key->lang_str.'/','',$referer);
            $referer = str_replace($host.$key->code.'/','',$referer);
            $lang_arr[] = $key->lang_str;
            $lang_arr[] = $key->code;
        }
        $last_url = str_replace($host,'',$referer);
        if(in_array($last_url, $lang_arr)){
            $last_url = '';
        }
        $get_redirect_url = $host.$langcode.$last_url;
        return $get_redirect_url;
    }
}
    
