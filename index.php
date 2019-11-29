<?php

use Phooty\Entities\ActivePlayer;
// use Phooty\Support\Utils\StringUtil;

require __DIR__ . '/vendor/autoload.php';

$app = include_once 'bootstrap/app.php';
$player = new ActivePlayer(($app['factory.player']->create()));

// dump(StringUtil::baseClassName(StringUtil::class));

dd($player->moveTo(12, 16));
