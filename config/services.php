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
        'client_id' => '1100408396697613',
        'client_secret' => 'd7faacdba81b02af6af20ec97178505a',
        'redirect' => 'http://staging.luxify.com/oauth/callback/facebook'
    ],

    'twitter' => [
        'client_id' => '7Hd52pGSBKbK5cAHF8nfND8xY',
        'client_secret' => 'bNcX3VwoXW0Y87yczYpvrLsgXdSl1J4yrjZZuLNYBtHFkFxDJf',
        'redirect' => 'http://staging.luxify.com/oauth/callback/twitter'
    ],

];
