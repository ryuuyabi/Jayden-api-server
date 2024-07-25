<?php

return [
    'access_key_id' => env('AWS_ACCESS_KEY_ID'),
    'secret_access_id' => env('AWS_SECRET_ACCESS_KEY'),
    'default_region' => env('AWS_DEFAULT_REGION'),
    'bucket' => env('AWS_BUCKET'),
    'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT'),
    'cognito_client_id' => env('AWS_COGNITO_CLIENT_ID'),
    'cognito_client_secret' => env('AWS_COGNITO_CLIENT_SECRET'),
    'cognito_user_pool_id' => env('AWS_COGNITO_USER_POOL_ID'),
];
