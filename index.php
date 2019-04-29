<?php
use Doctrine\ORM\EntityManagerInterface;

require 'vendor/autoload.php';

$app = include_once 'bootstrap.php';

//$app->make(Phooty\Core\Simulation::class)->run();
dd($app->make(EntityManagerInterface::class));
