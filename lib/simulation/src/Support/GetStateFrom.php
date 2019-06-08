<?php
namespace Phooty\Simulation\Support;

use Phooty\Simulation\Match\MatchContainer;
use Phooty\Simulation\State\MatchState;

class GetStateFrom
{
    public static function match(MatchContainer $match)
    {
        $total = $match->getTimer()->getTotal();
        return new MatchState($total, []);
    }
}
