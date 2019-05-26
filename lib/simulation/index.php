<?php
use Phooty\Simulation\Kernel;
//use Phooty\Simulation\MatchSimulator;

require __DIR__.'/vendor/autoload.php';

Kernel::loadClassAliases();
/* if (1 < $argc) {
    // args
    dd($argv);
} */
//dd(PhootyGround::subiaco());
$kernel = new Kernel();
/* $kernel->setGround();
dd($kernel); */
$kernel->simulate();
