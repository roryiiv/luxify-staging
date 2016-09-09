<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => 'AKIAIDVXBXDEVIFDY6BQ',
        'secret' => '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',
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1832673026944164',
        'client_secret' => '056ea6982f0e69c2e554f09b46a654a6',
        'redirect' => 'https://www.luxify.com/oauth/callback/facebook'
    ],

    'twitter' => [
        'client_id' => 'eUnA8iLtyfTnLKYxW0PtgUGxv',
        'client_secret' => 'AeHNM3LEta0ZQFajgk3DpiSbJGwVBaqnMiPEHpcgG4vY44de4l',
        'redirect' => 'https://www.luxify.com/oauth/callback/twitter'
    ],

    'linkedin' => [
        'client_id' => '783p2yh9hi6w89',
        'client_secret' => 'YzweF7EXb57IJcvB',
        'redirect' => 'https://www.luxify.com/oauth/callback/linkedin'
    ],

];
