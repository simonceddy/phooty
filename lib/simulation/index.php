<?php
use Phooty\Simulation\Kernel;
use Carbon\Carbon;
use Phooty\Simulation\Entities\Team;

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

$home = new Team([]);

$away = new Team([], true);

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

dd($kernel);
