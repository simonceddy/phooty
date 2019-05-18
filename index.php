<?php
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand;
use Phooty\Core\Support\MovableEntityBridge;

//use Doctrine\ORM\EntityManagerInterface;

//require 'vendor/autoload.php';
require 'autoload.php';
//dd(new ReflectionClass(CreateCommand::class));
$app = include_once 'bootstrap.php';

$player = new Phooty\Orm\Entities\Player();
$player->setSurname('jiffy');

$map = new Phooty\Core\Tilemap\Tilemap(120, 180);

$map->tile(100, 78)->addMovableEntity(new MovableEntityBridge($player));

dd($map);

//$app->make(Phooty\Core\Simulation::class)->run();
$kernel = $app->make(Phooty\Console\Kernel::class);
//dd($app);


$kernel->getHelperSet()->set($app->make(EntityManagerHelper::class));

$kernel->run();
