<?php
//use Doctrine\ORM\EntityManagerInterface;

require 'autoload.php';
//require 'vendor/autoload.php';

$app = include_once 'bootstrap.php';

//dd($app->make(Phooty\Orm\Entities\Player::class)->findAll());

//$app->make(Phooty\Core\Simulation::class)->run();
$kernel = $app->make(Phooty\Console\Kernel::class);

$kernel->run();
