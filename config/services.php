<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    // OAuth Login Information
    'facebook' => [
        'client_id' => env('FACEBOOK_KEY'),
        'client_secret' => env('FACEBOOK_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT_URI'),
    ],
    'battlenet' => [
        'client_id' => env('BATTLE.NET_KEY'),
        'client_secret' => env('BATTLE.NET_SECRET'),
        'redirect' => env('BATTLE.NET_REDIRECT_URI')
    ],
    'discord' => [
        'client_id' => env('DISCORD_KEY'),
        'client_secret' => env('DISCORD_SECRET'),
        'redirect' => env('DISCORD_REDIRECT_URI')
    ],
    'steam' => [
        'client_id' => null,
        'client_secret' => env('STEAM_KEY'),
        'redirect' => env('STEAM_REDIRECT_URI')
    ],

    //'postmark' => [
    //    'token' => env('POSTMARK_TOKEN'),
    //],

    //'ses' => [
    //    'key' => env('AWS_ACCESS_KEY_ID'),
    //    'secret' => env('AWS_SECRET_ACCESS_KEY'),
    //    'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    //],

];
