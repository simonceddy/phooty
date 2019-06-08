<?php
namespace Phooty\Simulation\Core;

use Phooty\Simulation\Support\MapPlacer;
use Phooty\Simulation\Support\Traits\EmitsEvents;
use Phooty\Simulation\Match\MatchContainer;
use Phooty\Simulation\Emitter;
use Phooty\Simulation\Support\GetStateFrom;

class MatchSimulator
{
    use EmitsEvents;

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

    private $is_bootstrapped = false;

    /**
     * The PeriodSimulator instance
     *
     * @var PeriodSimulator
     */
    private $period_sim;

    public function __construct(MatchContainer $match, Emitter $emitter)
    {
        $this->emitter = $emitter;
        $this->match = $match;
    }

    private function bootstrapSim()
    {
        $this->period_sim = new PeriodSimulator($this->match);

        $this->bootstrapEmitter($this->emitter);

        $this->is_bootstrapped = true;
    }

    private function bootstrapEmitter(Emitter $emitter)
    {
        $timer = $this->match->getTimer();

        $emitter->on('sim.endPeriod', function () use ($timer) {
            dump("Period {$timer->getResets()} complete!");
            $this->period_sim->finish();
            if ($timer->getResets() >= $this->getMaxPeriods()) {
                $this->emit('sim.endMatch');
            }
        });

        $emitter->on('sim.endMatch', function () {
            $this->finish();
            dump("Match finished!");
        });

        $emitter->on('timer.tick', function () {
            $state = GetStateFrom::match($this->match);
            $this->match->getStates()->add($state);
        });
    }

    /**
     * Run the simulation
     *
     * @return mixed
     */
    public function run()
    {
        $this->is_bootstrapped ?: $this->bootstrapSim();

        (new MapPlacer($this->match))->run();
        
        //$timer = $this->match->getTimer();
        
        $this->started = true;

        $periods = [];

        while (!$this->finished) {
            $periods[] = $this->period_sim->run();
            $this->period_sim->clear();
            // simulate a period until period end
            // repeat until match end
        }
        
        return $periods;
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
