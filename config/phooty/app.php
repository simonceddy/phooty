<?php
return [
    'name' => 'Phooty',
    'version' => '0.1.0',

    'dev_mode' => true,

    'providers' => [
        Phooty\Core\CoreServiceProvider::class,
        Phooty\Orm\OrmServiceProvider::class,
        Phooty\Crawler\CrawlerServiceProvider::class
    ]
];
