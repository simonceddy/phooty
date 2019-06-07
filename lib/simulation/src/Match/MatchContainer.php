<?php
namespace Phooty\Simulation\Match;

use Phooty\Simulation\Tilemap\Tilemap;
use Phooty\Simulation\Support\Timer;
use Phooty\Simulation\Entities\Team;
use Phooty\Simulation\Support\MatchBuilder;
use Phooty\Simulation\Support\StateCollection;

class MatchContainer
{
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

    /**
     * The home Team object
     *
     * @var Team
     */
    protected $homeTeam;

    /**
     * The away Team object
     *
     * @var Team
     */
    protected $awayTeam;

    /**
     * Create a new MatchContainer instance
     * 
     * @param MatchBuilder $builder The MatchBuilder instance
     */
    public function __construct(MatchBuilder $builder) {
        if (!$builder->isValid()) {
            throw new \Exception("Invalid match!");
        }
        $this->timer = $builder->getTimer();
        $this->tilemap = $builder->getGround();
        $this->homeTeam = $builder->getHomeTeam();
        $this->awayTeam = $builder->getAwayTeam();
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

    /**
     * Get the home Team object
     *
     * @return  Team
     */ 
    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Get the away Team object
     *
     * @return  Team
     */ 
    public function getAwayTeam()
    {
        return $this->awayTeam;
    }
}
