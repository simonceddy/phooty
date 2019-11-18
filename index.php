<?php

use Phooty\Core\Entities\MatchPlayer;
use Phooty\Core\Kernel;

require __DIR__ . '/vendor/autoload.php';

$app = include_once 'bootstrap/app.php';
$player = new MatchPlayer(($app['factory.player']->create()));
dd($player->moveTo(12, 16));
