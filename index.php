<?php
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand;
use Phooty\Core\Support\MovableEntityWrapper;
use Phooty\Orm\Support\EntityToArray;

//use Doctrine\ORM\EntityManagerInterface;

require 'vendor/autoload.php';
require 'autoload.php';
//dd(new ReflectionClass(CreateCommand::class));
//$app = include_once 'bootstrap.php';

/* $player = new Phooty\Orm\Entities\Player();
$player->setSurname('jiffy'); */

/* $map = new Phooty\Core\Tilemap\Tilemap(120, 180);

$tile = $map->tile(100, 78);
$tile->addMovableEntity($mp = new MovableEntityWrapper($player));
//dd($tile->hasEntity($mp));
dd($map); */

//dd((new EntityToArray())->convert($player));

//$app->make(Phooty\Core\Simulation::class)->run();
//$kernel = $app->make(Phooty\Console\Kernel::class);
//dd($app);

$knl = new Phooty\Simulation\Kernel();

$loop = React\EventLoop\Factory::create();

$loop->addPeriodicTimer(1, function () {
    echo "true!\n";
});
$loop->run();
//dd($loop, memory_get_usage());

/* $kernel->getHelperSet()->set($app->make(EntityManagerHelper::class));

$kernel->run(); */
