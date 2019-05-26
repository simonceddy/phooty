<?php
namespace Phooty\Simulation\Events\Match;

use Symfony\Component\EventDispatcher\Event;
use Phooty\Simulation\MatchSimulator;
use Phooty\Simulation\Support\Timer;
use Phooty\Simulation\MatchContainer;

abstract class BaseMatchEvent extends Event
{
    /**
     * The MatchContainer instance
     *
     * @var MatchContainer
     */
    protected $match;

    public function __construct(MatchContainer $match)
    {
        $this->match = $match;
    }

    /**
     * Get the simulator's timer
     *
     * @return Timer
     */
    public function timer()
    {
        return $this->match->getTimer();
    }

    /**
     * Get the MatchSimulator instance
     *
     * @return MatchSimulator
     */
    public function sim()
    {
        return $this->match->getSim();
    }
}
