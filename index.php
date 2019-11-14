<?php
require __DIR__ . '/vendor/autoload.php';

if (file_exists(__DIR__ . '/.env')) {
    Dotenv\Dotenv::create(__DIR__)->load();
}

$app = new Phooty\App\Application();

dd($app);
