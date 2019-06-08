<?php
namespace Phooty\Simulation\Tilemap;

class Ground
{
    public const MCG = [180, 160];

    public const SCG = [160, 150];

    public const GABBA = [160, 150];

    public const PERTH_STADIUM = [160, 150];

    public const WACA = [160, 150];

    public const SUBIACO = [160, 150];

    public const DOCKLANDS = [160, 150];

    public const GIANT_STADIUM = [160, 150];

    public const KARDINIA_PARK = [160, 150];

    public const WAVERLY_PARK = [160, 150];

    protected static $grounds = [
        'mcg' => [140, 120],
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

    public static function random()
    {
        [$w, $l] = array_random(self::$grounds);
        return self::make($w, $l);
    }

    public static function make(int $width, int $length)
    {
        if (1 > $width || 1 > $length) {
            throw new \InvalidArgumentException(
                "Dimensions cannot be less than 1"
            );
        }

        return new PendingMap($width, $length);
    }

    public static function preset(string $name)
    {
        if (!isset(self::$grounds[$name])) {
            return false;
        }
        [$w, $l] = self::$grounds[$name];
        return self::make($w, $l);
    }

    public static function __callStatic(string $name, $arguments)
    {
        if (isset(self::$grounds[$name])) {
            [$w, $l] = self::$grounds[$name];
            return self::make($w, $l);
        }
    }
}
