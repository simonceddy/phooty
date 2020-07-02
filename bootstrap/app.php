<?php
if (file_exists(dirname(__DIR__) . '/.env')) {
    \Dotenv\Dotenv::create(dirname(__DIR__))->load();
}

$app = new \Phooty\Core\Application(
    new \Pimple\Container()
);

return $app;
