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
     * Creation datetime object
     *
     * @var \DateTime
     */
    private $created;

    public function __construct(array $state)
    {
        $this->state = $state;

        $this->created = new \DateTime('now');
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState(array $state): MatchState
    {
        return new MatchState($state);
    }

    /**
     * Get creation datetime object
     *
     * @return  \DateTime
     */ 
    public function getCreated()
    {
        return $this->created;
    }
}
