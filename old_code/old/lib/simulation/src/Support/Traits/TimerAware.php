<?php
namespace Phooty\Simulation\Support\Traits;

trait TimerAware
{
    /**
     * The Timer instance
     *
     * @var Timer
     */
    protected $timer;
    
    /**
     * Get the Timer instance
     *
     * @return  Timer
     */ 
    public function getTimer()
    {
        return $this->timer;
    }
}
