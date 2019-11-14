<?php
require __DIR__ . '/vendor/autoload.php';

$app = new Phooty\App\Container();

$ref = new ReflectionClass($app);

dd($app['sim']);
