<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Socialite;

class SocialAuthController extends Controller
{
    //controller for social oauth login.

    public function fb_redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function fb_callback(SocialAccountService $service)
    {
        // when facebook call us a with token
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect()->to('/home');
    }
}
