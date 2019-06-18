<?php
require 'vendor/autoload.php';
require 'autoload.php';
//$app = include_once 'bootstrap.php';

//$kernel = $app->make(Phooty\Console\Kernel::class);

//$kernel->run();
$app = new Phooty\App\Application();

echo (new Symfony\Component\Console\Formatter\OutputFormatter())->format(
    Phooty\Console\Artwork\TitleLarry3D::render()
);


$app->run();
