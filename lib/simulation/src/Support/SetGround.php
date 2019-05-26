<?php
namespace Phooty\Simulation\Support;

use Phooty\Simulation\Tilemap\Ground;
use Phooty\Simulation\Tilemap\Tilemap;
use Phooty\Simulation\Tilemap\PendingMap;

class SetGround
{
    /**
     * Return a PendingMap intance for the given args.
     * 
     * Returns false if invalid args.
     *
     * @param array $args
     * @return PendingMap|false
     */
    public static function resolve(array $args)
    {
        switch ($c = count($args)) {
            case 0 || (1 && null === $args[0]):
                [$w, $l] = Ground::random();
                $g = Ground::make($w, $l);
                break;
            case 1 && ($args[0] instanceof Tilemap):
                $g = $args[0];
                break;
            case 1 && is_string($args[0]):
                [$w, $l] = Ground::preset($args[0]);
                $g = Ground::make($w, $l);
                break;
            case 1 && is_array($args[0]) && (2 >= count($args[0])):
                [$w, $l] = $args[0];
                $g = Ground::make($w, $l);
                break;
            case 2 && is_int($w = $args[0]) && is_int($l = $args[1]):
                $g = Ground::make($w, $l);
                break;
            default:
                $g = false;
        }

        return $g;
    }
}
