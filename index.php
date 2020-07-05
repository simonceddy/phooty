<?php
require __DIR__ . '/vendor/autoload.php';

echo 'Phoooooty';

$app = include_once __DIR__ . '/bootstrap/app.php';

dd($app[\Phooty\Testing\PlayerFactory::class]->make());
