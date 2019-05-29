<?php
namespace Phooty\Simulation\Events\Match;

use Symfony\Component\EventDispatcher\Event;
use Phooty\Simulation\MatchSimulator;
use Phooty\Simulation\MatchContainer;
use Phooty\Simulation\Support\Timer;

abstract class BaseMatchEvent extends Event
{
    /**
     * The MatchSimulator instance
     *
     * @var MatchSimulator
     */
    protected $sim;

    public function __construct(MatchSimulator $sim)
    {
        $this->sim = $sim;
    }

    /**
     * Get the simulator's timer
     *
     * @return Timer
     */
    public function timer()
    {
        return $this->sim->getMatch()->getTimer();
    }

    /**
     * Get the MatchSimulator instance
     *
     * @return MatchSimulator
     */
    public function sim()
    {
        return $this->sim;
    }

    /**
     * Returns the MatchContainer
     *
     * @return MatchContainer
     */
    public function getMatch()
    {
        return $this->sim->getMatch();
    }
}
