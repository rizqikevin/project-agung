<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'penggunas'),
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'penggunas',
        ],
    ],

    'providers' => [
        'penggunas' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\Pengguna::class),
        ],
    ],

    'passwords' => [
        'penggunas' => [
            'provider' => 'penggunas',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
