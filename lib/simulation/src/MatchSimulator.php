<?php
namespace Phooty\Simulation;

use Phooty\Simulation\Support\Timer;
use Phooty\Simulation\Support\Traits\KernelAware;
use Phooty\Simulation\Support\Traits\TimerAware;

class MatchSimulator
{
    use KernelAware, TimerAware;

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

    public function __construct(Timer $timer, Kernel $kernel)
    {
        $this->kernel = $kernel;
        $this->timer = $timer;
    }

    /**
     * Run the simulation
     *
     * @return mixed
     */
    public function run()
    {
        if (!$this->kernel->isBootstrapped()) {
            $this->kernel->bootstrap();
        }
        $this->started = true;

        while (!$this->isFinished()) {
            $this->timer->tick(mt_rand(100, 1000));
            //dd($this->timer);
        }

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
}
