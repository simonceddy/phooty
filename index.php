<?php
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand;

//use Doctrine\ORM\EntityManagerInterface;

//require 'vendor/autoload.php';
require 'autoload.php';
//dd(new ReflectionClass(CreateCommand::class));
$app = include_once 'bootstrap.php';
//dd($app->make(Phooty\Orm\Entities\Player::class)->findAll());

//$app->make(Phooty\Core\Simulation::class)->run();
$kernel = $app->make(Phooty\Console\Kernel::class);
//dd($app);


$kernel->getHelperSet()->set($app->make(EntityManagerHelper::class));

$kernel->run();
