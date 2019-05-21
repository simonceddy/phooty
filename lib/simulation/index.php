<?php
use Phooty\Simulation\Kernel;
use Phooty\Simulation\MatchSimulator;

require __DIR__.'/vendor/autoload.php';

$krnl = new Kernel();

$sim = $krnl->app()->make(MatchSimulator::class);

$result = $sim->run();

foreach ($result as $a) {
    dump($a);
}
