<?php

use Ds\Deque;
use Phooty\Core\Action;
use Phooty\Entities\ActivePlayer;
// use Phooty\Support\Utils\StringUtil;

require __DIR__ . '/vendor/autoload.php';

$app = include_once 'bootstrap/app.php';
// $player = new ActivePlayer(($app['factory.player']->create()));

// dump(StringUtil::baseClassName(StringUtil::class));

$actions = new Deque([
    new Action('kick'),
    new Action('move'),
    new Action('move'),
]);


dd($actions);
