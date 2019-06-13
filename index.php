<?php
require 'vendor/autoload.php';
require 'autoload.php';
$app = include_once 'bootstrap.php';

/* $player = new Phooty\Orm\Entities\Player();
$player->setSurname('jiffy'); */

/* $map = new Phooty\Core\Tilemap\Tilemap(120, 180);

$tile = $map->tile(100, 78);
$tile->addMovableEntity($mp = new MovableEntityWrapper($player));
//dd($tile->hasEntity($mp));
dd($map); */

//dd((new EntityToArray())->convert($player));

//$app->make(Phooty\Core\Simulation::class)->run();
$kernel = $app->make(Phooty\Console\Kernel::class);
$kernel->run();
//dd($app);

//$knl = new Phooty\Simulation\Kernel();
//dd($loop, memory_get_usage());

/* $kernel->getHelperSet()->set($app->make(EntityManagerHelper::class));

$kernel->run(); */
