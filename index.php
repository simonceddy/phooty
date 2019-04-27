<?php
require 'vendor/autoload.php';

//phooty()->make(Phooty\Console\Kernel::class)->run();
dd(phooty()->make(Phooty\Crawler\Crawler\SeasonPlayerTotals::class));