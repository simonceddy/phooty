<?php
use Phooty\Simulation\Kernel;
use Carbon\Carbon;
use Phooty\Simulation\Entities\Team;
use Phooty\Simulation\Factory\PlayerEntityFactory;

//use Phooty\Simulation\MatchSimulator;

require __DIR__.'/vendor/autoload.php';

$start = Carbon::now()->getTimestamp();
//dump($start);
Kernel::loadClassAliases();
/* if (1 < $argc) {
    // args
    dd($argv);
} */
//dd(PhootyGround::subiaco());
$kernel = new Kernel();

$players = [
    'h' => [],
    'a' => []
];

$factory = $kernel->app()->make(PlayerEntityFactory::class);

foreach ($players as $team => &$list) {
    for ($i = 0; $i < 18; $i++) {
        $list[] = $factory->create();
    }
}

$home = new Team([], $players['h']);

$away = new Team([], $players['a'], true);

$sim = $kernel->makeSim(function ($builder) use ($home, $away) {
    $builder->setGround(PhootyGround::mcg());
    $builder->setHomeTeam($home);
    $builder->setAwayTeam($away);
});

//dd($sim);

$sim->run();

$end = Carbon::now()->getTimestamp();

//dump($end);

$total = $end - $start;

dump("Sim took {$total} microseconds");

//dd($kernel);
