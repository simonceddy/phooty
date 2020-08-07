<?php
$rootDir = dirname(__DIR__);

if (file_exists($rootDir . '/.env')) {
    \Dotenv\Dotenv::create(dirname(__DIR__))->load();
}

$app = (new \Phooty\Support\BootstrapApp(
    $rootDir
))->bootstrap(new \Pimple\Container());

return $app;
