<?php
namespace Phooty\Simulation;

use Phooty\Simulation\Tilemap\Tilemap;
use Phooty\Simulation\Support\Traits\SimAware;
use Phooty\Simulation\Support\Timer;

class MatchContainer
{
    use SimAware;
    
    /**
     * The Match's tilemap
     *
     * @var Tilemap
     */
    protected $tilemap;

    /**
     * The Match states
     *
     * @var StateCollection
     */
    protected $states;

    /**
     * The timer instance
     *
     * @var Timer
     */
    protected $timer;

    protected $homeTeam;

    protected $awayTeam;

    public function __construct(
        Timer $timer,
        Tilemap $tilemap
    ) {
        $this->timer = $timer;
        $this->tilemap = $tilemap;
    }

    /**
     * Get the Match's tilemap
     *
     * @return  Tilemap
     */ 
    public function getTilemap()
    {
        return $this->tilemap;
    }

    /**
     * Returns the Sim's timer instance.
     *
     * @return Timer
     */
    public function getTimer()
    {
        return $this->timer;
    }

    /**
     * Return the collection of MatchStates
     *
     * @return StateCollection
     */
    public function getStates(): StateCollection
    {
        isset($this->states) ?: $this->states = new StateCollection();
        return $this->states;
    }
}
