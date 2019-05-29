<?php
namespace Phooty\Simulation\Events\Timer;

use Symfony\Component\EventDispatcher\Event;
use Phooty\Simulation\MatchContainer;
use Phooty\Simulation\StateCollection;
use Phooty\Simulation\Support\Timer;

class TickEvent extends Event
{
    public const NAME = 'timer.tick';

    /**
     * The MatchContainer instance
     *
     * @var MatchContainer
     */
    private $match;

    public function __construct(MatchContainer $match)
    {
        $this->match = $match;
    }
    

    /**
     * Get the MatchContainer instance
     *
     * @return  MatchContainer
     */ 
    public function getMatch()
    {
        return $this->match;
    }

    /**
     * Get the MatchState collection
     *
     * @return StateCollection
     */
    public function getStates()
    {
        return $this->match->getStates();
    }

    /**
     * Get the Match timer instance
     *
     * @return Timer
     */
    public function getTimer()
    {
        return $this->match->getTimer();
    }
}
