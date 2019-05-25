<?php
namespace Phooty\Simulation\Tilemap;

class Ground
{
    protected static $grounds = [
        'mcg' => [180, 160],
        'scg' => [160, 150],
        'metriconStadium' => [160, 150],
        'gabba' => [160, 150],
        'waca' => [160, 150],
        'subiaco' => [160, 150],
        'perthStadium' => [160, 150],
        'docklands' => [160, 150],
        'giantStadium' => [160, 150],
        'kardiniaPark' => [160, 150],
        'waverlyPark' => [160, 150],
        'victoriaPark' => [160, 150],
        'windyHill' => [160, 150],
        'whittenOval' => [160, 150],
        'adelaideOval' => [160, 150],
        'marsStadium' => [160, 150],
        'cazalyStadium' => [160, 150],
    ];

    public static function __callStatic(string $name, $arguments)
    {
        if (isset(self::$grounds[$name])) {
            [$w, $l] = self::$grounds[$name];
            return MapFactory::create($w, $l);
        }
    }
}
