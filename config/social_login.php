<?php

return [
    'Google' => [
        'clientId' => env('GOOGLE_CLIENT_ID', null),
        'clientSecret' => env('GOOGLE_SECRET', null),
        // Google wymaga ustawienia dokładnego adresu w konsoli, nie tylko domeny
        // ale nie robi problemów z localhostem
        // można też wpisać port
        'redirectUri' => 'http://localhost:8765/login',
        'prompt' => 'consent', // [none|consent]
        'scope' => ['email', 'profile'],
    ],
    'Facebook' => [
        'appId' => env("FB_APP_ID", null),
        'appSecret' => env("FB_SECRET", null),
        'appApiVersion' => 'v6.0',
        'permissions' => ['email'],
        'callbackUrl' => 'http://localhost:8765/login'
    ]
];
