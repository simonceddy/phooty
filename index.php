<?php
require __DIR__ . '/vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

$ref = new ReflectionClass($loop);

dd($ref->getMethod('addSignal'));
