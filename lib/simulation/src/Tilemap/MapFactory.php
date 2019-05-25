<?php
namespace Phooty\Simulation\Tilemap;

class MapFactory
{
    public static function create(int $width, int $length)
    {
        return new Tilemap($width, $length);
    }
}
