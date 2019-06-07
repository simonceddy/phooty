<?php
use Phooty\Simulation\Kernel;
use Carbon\Carbon;
use Phooty\Simulation\Factory\TeamFactory;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Cloner\Data;

//use Eddy\Tilemap\Visualizer\HtmlDumper;

require __DIR__.'/vendor/autoload.php';

//dump(memory_get_usage());
$dumper = new HtmlDumper();

$dumper->setTheme('light');

$start = Carbon::now()->getTimestamp();

$kernel = new Kernel();

//dd($kernel);

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

//HtmlDumper::dump($sim->getMatch()->getTilemap());
//dd();
$data = [];

$data[] = "Sim took {$total} microseconds";
//dump(memory_get_usage());
//dd($kernel);
//dump($sim->getMatch());

$data = new Data($data);

$dumper->dump($data);

dump($sim);
