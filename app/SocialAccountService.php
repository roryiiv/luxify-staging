<?php

namespace App;

//use Laravel\Socialite\Contracts\User as ProviderUser;
use Laravel\Socialite\Contracts\Provider;



class SocialAccountService{
/*    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider($providerUser)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            //login
            return $account->user;
        } else {
            //create
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerUser
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'firstName' => $providerUser->getNickname(),
                    'fullname' => $providerUser->getName(),
                    'role' => 'user',

//                    getId(), getNickname(), getName(), getEmail(), getAvatar()
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
    */
    public function createOrGetUser(Provider $provider) {

        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            //jika account ditemukan di table social_accounts
            $data['status'] = true;
            $data['user'] = $account->user;
            return $data;
        } else {
            //account user_id di social_account tidak ditemukan

            $checkemail = User::whereEmail($providerUser->getEmail())->first();
            //check email??
            if($checkemail){
                $user = User::where('email', $providerUser->getEmail())->first();
                $row_social = ($providerName=='FacebookProvider')?'socialFacebook':'socialTwitter';
                $link = ($providerName=='FacebookProvider')?'https://facebook.com':'https://twitter.com';

                $user->email = $providerUser->getEmail();
                $user->$row_social = $link.'/'.$providerUser->getId();
                $user->save();

                $data['email'] = $providerUser->getEmail();
                $data['status'] = false;
                $data['error'] = 'this email has been used, please login using luxify account ';
                return $data;
            }else{

                if($providerUser->getEmail()==null){
                $data['status'] = false;
                $data['error'] = 'we can not get your email address from your social account. please configure your account';
                return $data;
                }else{
                    //data tidak di temukan, dan membuat data sendiri.
                    $account = new SocialAccount([
                        'provider_user_id' => $providerUser->getId(),
                        'provider' => $providerName
                    ]);

                    $user = User::whereEmail($providerUser->getEmail())->first();

                    if (!$user) {

                        $user = User::create([
                            'email' => $providerUser->getEmail(),
                            'firstName' => $providerUser->getNickname(),
                            'fullname' => $providerUser->getName(),
                            'role' => 'user',
                        ]);
                    }
                    $account->user()->associate($user);
                    $account->save();

                    if($account){
                        $data['status'] = true;
                        $data['user'] = $user;
                        return $data;
                    }else{
                        $data['status'] = false;
                        $data['error'] = 'error, we cannot configure youre account';
                        return $data;
                        
                    }
                }
            }            
        }
    }
}
/*
namespace App;

use Laravel\Socialite\Contracts\Provider;

class SocialAccountService
{
    public function createOrGetUser(Provider $provider)
    {

        $providerUser = $provider->user();
        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}*/