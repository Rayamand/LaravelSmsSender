<?php

return [
    'test' => 'test',
    'default' => env("SMS_PROVIDER", "melipayamak"),

    'providers' => [
        'melipayamak' => [
            'token' => env("SMS_TOKEN")
        ],
        'farazsms' => [
            'username' => env("SMS_USERNAME"),
            'password' => env("SMS_PASSWORD"),
            'number' => env("SMS_NUMBER"),
        ]
    ]
];