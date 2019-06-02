<?php
namespace Phooty\Simulation;

use Phooty\Simulation\Support\MapPlacer;

class MatchSimulator
{
    /**
     * Has the simulation started
     *
     * @var boolean
     */
    private $started = false;

    /**
     * Has the simulation finished
     *
     * @var boolean
     */
    private $finished = false;

    /**
     * The amount of periods to simulate (default = 4)
     *
     * @var integer
     */
    private $periods = 4;

    /**
     * The MatchContainer
     *
     * @var MatchContainer
     */
    private $match;

    public function __construct(MatchContainer $match)
    {
        $this->match = $match;
    }

    /**
     * Run the simulation
     *
     * @return mixed
     */
    public function run()
    {
        (new MapPlacer($this->match))->run();
        
        $timer = $this->match->getTimer();
        
        $this->started = true;

        while (!$this->finished) {
            $timer->tick(mt_rand(100, 1000));
            //dd($this->timer);
        }
        //dd($this->match);
        return;
    }

    /**
     * Check if the simulator has started.
     *
     * @return boolean
     */
    public function isStarted(): bool
    {
        return $this->started;
    }

    /**
     * Check if the simulator has finished.
     *
     * @return boolean
     */
    public function isFinished(): bool
    {
        return $this->finished;
    }

    /**
     * Force the simulation loop to finish
     *
     * @return self
     */
    public function finish()
    {
        $this->finished = true;
        return $this;
    }

    /**
     * Get the amount of periods to simulate (default = 4)
     *
     * @return  integer
     */ 
    public function getMaxPeriods()
    {
        return $this->periods;
    }

    /**
     * Get the MatchContainer
     *
     * @return  MatchContainer
     */ 
    public function getMatch()
    {
        return $this->match;
    }
}
