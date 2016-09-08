<?php

namespace App\Http\Middleware;

use Auth;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role=null)
    {   
        //get all access for admin
        if(Auth::user()->role =='admin'){
            return $next($request);
        }else{
            //checking role
            if(Auth::user()->role != $role){
                return redirect('/logout');
            }else{
                return $next($request);
            }            
        }
    }
}
