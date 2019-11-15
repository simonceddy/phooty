<?php
return [
    'env' => env('APP_ENVIRONMENT', 'dev'),
    // The service providers to register when the app is started
    'providers' => [
        Phooty\Core\CoreProvider::class,
        Phooty\Core\ActionOutcomeProvider::class,
        Phooty\Support\Providers\FactoryProvider::class,
    ],
    'providers-dev' => [
    ]
];
