<?php

return [
    'gmaps' => [
        'client' => [
            'key' => env('GOOGLE_MAPS_CLIENT_API_KEY'),
        ],
        'server' => [
            'key' => env('GOOGLE_MAPS_SERVER_API_KEY'),
        ],
    ],
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],
    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
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
];
