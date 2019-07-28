<?php
namespace Phooty\Simulation\State;

/**
 * The MatchState object should be a record of stats for a specific time in
 * the match.
 * 
 * It should be immutable and return a new instance when changed.
 */
class MatchState
{
    /**
     * The Match state as an array
     *
     * @var array
     */
    private $state;

    /**
     * Current timer
     *
     * @var int
     */
    private $current;

    public function __construct(int $current, array $state)
    {
        $this->current = $current;
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    /**
     * Get the timer
     *
     * @return  int
     */ 
    public function getTime()
    {
        return $this->current;
    }
}
