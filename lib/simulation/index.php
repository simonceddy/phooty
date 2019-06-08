<?php
use Phooty\Simulation\Kernel;
use Carbon\Carbon;
use Phooty\Simulation\Factory\TeamFactory;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Cloner\Data;

require __DIR__.'/vendor/autoload.php';

$dumper = new HtmlDumper();

$dumper->setTheme('light');

$start = Carbon::now()->getTimestamp();

$kernel = new Kernel();

$factory = $kernel->app()->make(TeamFactory::class);

$home = $factory->create();

$away = $factory->create(['away' => true]);

$sim = $kernel->makeSim(function ($builder) use ($home, $away) {
    $builder->setGround(Phooty\Simulation\Tilemap\Ground::mcg());
    $builder->setHomeTeam($home);
    $builder->setAwayTeam($away);
});

$results = $sim->run();

$total = Carbon::now()->getTimestamp() - $start;

dump("Sim took {$total} microseconds");

$data = new Data([1]);

$dumper->dump($data);

dump($sim->getMatch());
