<?php
namespace Phooty\Simulation\State;

/**
 * The MapState object records the current positions of all simulation
 * entities.
 * 
 * It should be immutable and return a new instance when changed.
 */
class MapState
{
    /**
     * The Map state as an array
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
