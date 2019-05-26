<?php
namespace Phooty\Simulation\Support\Traits;

use Phooty\Simulation\MatchSimulator;

trait SimAware
{
    /**
     * The MatchSimulator instance
     *
     * @var MatchSimulator
     */
    protected $sim;

    /**
     * Get the MatchSimulator instance
     *
     * @return  MatchSimulator
     */ 
    public function getSim()
    {
        return $this->sim;
    }
}
