<?php

return [
    'Google' => [
        'clientId' => '289201818328-mijedkjv5huoe2qccr47loth9e2ko9d0.apps.googleusercontent.com',
        'clientSecret' => 'hSsxal4SNdVlox34xvQJncLG',
        // Google wymaga ustawienia dokładnego adresu w konsoli, nie tylko domeny
        // ale nie robi problemów z localhostem
        // można też wpisać port
        'redirectUri' => 'http://localhost:8765/login',
        'prompt' => 'consent', // [none|consent]
        'scope' => ['email', 'profile'],
    ],
    'Facebook' => [
        'appId' => '817196625114836',
        'appSecret' => 'ca15ca5ae0ed8e4826f6574f146ccf21',
        'appApiVersion' => 'v6.0',
        'permissions' => ['email'],
        'callbackUrl' => 'http://localhost:8765/login'
    ]
];
