<?php
require 'vendor/autoload.php';

//phooty()->make(Phooty\Console\Kernel::class)->run();
dd(phooty()->make(Phooty\Core\Simulation::class)->run());

dd(phooty()->config());
