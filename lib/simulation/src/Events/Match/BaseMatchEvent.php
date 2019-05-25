<?php
namespace Phooty\Simulation\Events\Match;

use Symfony\Component\EventDispatcher\Event;
use Phooty\Simulation\Support\Traits\SimAware;
use Phooty\Simulation\MatchSimulator;
use Phooty\Simulation\Support\Timer;

abstract class BaseMatchEvent extends Event
{
    use SimAware;

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
        return $this->sim->getTimer();
    }
}
