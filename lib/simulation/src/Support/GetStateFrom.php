<?php
namespace Phooty\Simulation\Support;

use Phooty\Simulation\MatchContainer;
use Phooty\Simulation\State\MatchState;

class GetStateFrom
{
    public static function match(MatchContainer $match)
    {
        return new MatchState([
            $match->getTilemap()->toArray()
        ]);
    }
}
