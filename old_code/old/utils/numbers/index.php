<?php
use Phooty\Numbers\PlayerComparison;
use Phooty\Numbers\MeasuringStick;

require __DIR__.'/vendor/autoload.php';

$em = include_once dirname(__DIR__).'/orm/bootstrap.php';

$orm = new Phooty\Orm\Support\OrmUtil($em->getDoctrineManager());

$ms = new MeasuringStick($orm);

$counts = $ms->getMinMaxes(2018);

dd(json_encode($counts, JSON_PRETTY_PRINT));

$hodgey = $orm->find('player', [
    'surname' => 'Hodge',
    'given_names' => 'Luke'
]);

$gazza = $orm->find('player', [
    'surname' => 'Ablett',
    'given_names' => 'Gary'
]);

if (isset($hodgey, $gazza)) {

    dd((new PlayerComparison())->compareSeasonAvg($hodgey, $gazza, 2011));
}

