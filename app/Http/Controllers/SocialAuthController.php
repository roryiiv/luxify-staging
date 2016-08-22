<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Socialite;
use App\SocialAccountService;

class SocialAuthController extends Controller
{
    //controller for social oauth login.

    public function fb_redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function tw_redirect()
    {
        return Socialite::driver('twitter')->redirect();
    }
    public function in_redirect()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function provider_callback(SocialAccountService $service, $provider)
    {
        if(isset($_GET['error']) OR isset($_GET['denied'])){
            return redirect('/login');
        }
        $user = $service->createOrGetUser(Socialite::driver($provider));
        if($user['status']== true){
            auth()->login($user['user']);
            return redirect()->to('/dashboard/profile');
        }else{
            $error = $user['error'];
            if(isset($user['email'])){
                $email = $user['email'];
                return redirect()->to('/login?err='.$error.'&email='.$email);
            }else{
                return redirect()->to('/login?err='.$error);
            }
            
        }
    }
}
