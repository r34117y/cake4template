<?php

return [
    'Theme' => [
        'title' => 'CAKE_TEMPLATE',
        'logo' => [
            'mini' => '<b>X</b>-one',
            'large' => '<img src="/img/logo.svg" alt="X-One" id="logo-image">'
        ],
        'login' => [
            'show_remember' => true,
            'show_register' => true,
            //'show_social' => true //TODO - to będzie w głównej konfiguracji ustalone
        ],
        'folder' => ROOT,
        'skin' => 'red' // blue, yellow, green, purple, red, black [*-light]
    ]
];
