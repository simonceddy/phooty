<?php
namespace Phooty\Simulation\Events\Match;

use Symfony\Component\EventDispatcher\Event;
use Phooty\Simulation\MatchSimulator;

class EndMatchEvent extends Event
{
    public const NAME = 'match.end_match';

    private $sim;

    public function __construct(MatchSimulator $sim)
    {
        $this->sim = $sim;
    }
}
