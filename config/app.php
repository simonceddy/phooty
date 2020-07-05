<?php
return [
    'name' => 'Phooty',
    'version' => 'dev-6.0.1',

    'bindings' => [
        // container bindings
        \Phooty\Support\Text::class,
        \Phooty\Testing\PlayerFactory::class,
    ],

    'providers' => [
        // Service Providers
        \Phooty\Testing\Support\TestingProvider::class,
    ]
];
