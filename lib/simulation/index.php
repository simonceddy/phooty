<?php
use Phooty\Simulation\Kernel;
use Carbon\Carbon;
use Phooty\Simulation\Factory\TeamFactory;
use Eddy\Tilemap\Visualizer\HtmlDumper;

require __DIR__.'/vendor/autoload.php';

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

echo <<<EOT
<html>
<head>
    <title>Phooty</title>
    <style>
        html {
            background: black;
            color: white;
        }
    </style>
</head>
<body>
EOT;

$sim->run();

$total = Carbon::now()->getTimestamp() - $start;

//HtmlDumper::dump($sim->getMatch()->getTilemap());
//dd();

dump("Sim took {$total} microseconds");

//dd($kernel);
dump($sim->getMatch());

echo "</body></html>";
