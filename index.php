<?php

use Ds\Deque;
// use Phooty\Support\Utils\StringUtil;

require __DIR__ . '/vendor/autoload.php';

// $app = include_once 'bootstrap/app.php';
// $player = new ActivePlayer(($app['factory.player']->create()));

// dump(StringUtil::baseClassName(StringUtil::class));

$actions = new Deque([
    'kick',
    'move',
    'move',
]);

$grid = new Phooty\Ground\Grid(129, 28);

file_put_contents('test.json', json_encode($grid));

dd($grid);
