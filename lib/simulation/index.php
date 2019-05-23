<?php
use Phooty\Simulation\Kernel;
//use Phooty\Simulation\MatchSimulator;

require __DIR__.'/vendor/autoload.php';

$kernel = new Kernel();
dd($kernel->simulator()->run());
