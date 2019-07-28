<?php
use Phooty\Simulator\Builder\FluentMatchBuilder;
use Phooty\Simulator\Match\Ground;
use Phooty\Simulator\Match\Team;

require __DIR__ . '/vendor/autoload.php';

$builder = new FluentMatchBuilder();

$builder
    ->match(new Team)
    ->vs(new Team)
    ->at(new Ground());

dd($builder);
