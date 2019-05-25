<?php
use Phooty\Simulation\Kernel;
//use Phooty\Simulation\MatchSimulator;

require __DIR__.'/vendor/autoload.php';

/* if (1 < $argc) {
    // args
    dd($argv);
} */

$kernel = new Kernel();

$kernel->simulate();
