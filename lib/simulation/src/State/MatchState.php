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

    public function __construct(array $state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }
}
