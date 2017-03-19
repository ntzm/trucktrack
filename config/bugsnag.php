<?php

return [
    'api_key' => env('BUGSNAG_API_KEY'),
    'app_version' => 'development',
    'batch_sending' => true,
    'filters' => [
        'password',
    ],
    'query' => true,
    'bindings' => true,
    'notify_release_stages' => [
        'production',
    ],
    'send_code' => true,
    'callbacks' => true,
    'user' => true,
];
