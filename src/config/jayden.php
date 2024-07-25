<?php

return [
    'domain' => [
        'user' => env('USER_DOMAIN'),
        'admin' => env('ADMIN_DOMAIN'),
    ],
    'jwt' => [
        'key' => env('JWT_KEY')
    ]
];
