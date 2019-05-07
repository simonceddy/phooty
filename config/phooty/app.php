<?php
return [
    'name' => 'Phooty',
    'version' => '0.1.0',
    'environment' => env('APP_ENVIRONMENT', 'dev'),
    'dev_mode' => true,

    'providers' => [
        Phooty\Core\CoreServiceProvider::class,
        Phooty\Orm\OrmServiceProvider::class,
        Phooty\Orm\RepositoryServiceProvider::class,
        Phooty\Crawler\CrawlerServiceProvider::class,
        Phooty\Crawler\FactoryServiceProvider::class,
    ]
];
