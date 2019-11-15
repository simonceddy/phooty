<?php

use Phooty\Core\Kernel;

require __DIR__ . '/vendor/autoload.php';

$app = include_once 'bootstrap/app.php';

dd($app[Kernel::class]);
