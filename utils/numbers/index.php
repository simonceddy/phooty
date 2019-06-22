<?php
use Phooty\Numbers\PlayerComparison;
use Phooty\Numbers\StatCalc;

require __DIR__.'/vendor/autoload.php';

$em = include_once dirname(__DIR__).'/orm/bootstrap.php';

$orm = new Phooty\Orm\Support\OrmUtil($em->getDoctrineManager());

$hodgey = $orm->find('player', [
    'surname' => 'Hodge',
    'given_names' => 'Luke'
]);

$gazza = $orm->find('player', [
    'surname' => 'Ablett',
    'given_names' => 'Gary'
]);

if (isset($hodgey, $gazza)) {

    dd(StatCalc::careerAverages($gazza));
}

