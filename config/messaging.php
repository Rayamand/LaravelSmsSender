<?php

use App\Services\Messaging\Providers\FarazSmsService;
use App\Services\Messaging\Providers\MelliPayamakService;

return [
    'default' => env('MESSAGING_DEFAULT', "melipayamak"),

    'providers' => [
        'melipayamak' => [
            'service' => MelliPayamakService::class,
            'uri' => env('MESSAGING_MELLIPAYAK_URI', 'https://console.melipayamak.com/api'),
            'token' => env('MESSAGING_MELLIPAYAK_TOKEN', 'test'),
        ],
        'farazsms' => [
            'service' => FarazSmsService::class,
            'uri' => env('MESSAGING_FARAZSMS_URI', 'https://ippanel.com/api'),
            'username' => env('MESSAGING_FARAZSMS_USERNAME'),
            'password' => env('MESSAGING_FARAZSMS_PASSWORD'),
            'number' => env('MESSAGING_FARAZSMS_NUMBER'),
        ]
    ]
];