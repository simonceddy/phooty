<?php
return [
    'name' => 'Phooty',
    'version' => 'dev-6.0.1',

    'bindings' => [
        // container bindings
        
    ],

    'factories' => [
        // container factories
        'testing' => function () {
            return mt_rand(0, 10);
        }
    ],

    'providers' => [
        // Service Providers
        \Phooty\Testing\Support\TestingProvider::class,
    ]
];
