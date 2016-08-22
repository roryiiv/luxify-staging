<?php

namespace App;

//use Laravel\Socialite\Contracts\User as ProviderUser;
use Laravel\Socialite\Contracts\Provider;



class SocialAccountService{
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

                if($providerName=='FacebookProvider'){
                    $row_social = 'socialFacebook';
                    $link = 'https://facebook.com';
                }else if($providerName=='twitterProvider'){
                    $row_social = 'socialTwitter';
                    $link = 'https://twitter.com';
                }else if($providerName=='LinkedInProvider'){
                    $row_social = 'socialLinkedin';
                    $link = 'https://linkedin.com';
                }
                $user->email = $providerUser->getEmail();
                $user->$row_social = $link.'/'.$providerUser->getId();
                $user->save();

                $data['email'] = $providerUser->getEmail();
                $data['status'] = false;
                $data['error'] = 101;
                return $data;
            }else{

                if($providerUser->getEmail()==null){
                $data['status'] = false;
                $data['error'] = 102;
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
                        $data['error'] = 103;
                        return $data;
                        
                    }
                }
            }            
        }
    }
}
