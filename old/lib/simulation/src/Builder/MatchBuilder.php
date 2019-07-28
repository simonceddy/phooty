<?php
namespace Phooty\Simulation\Builder;

class MatchBuilder
{
    protected $homeTeam;

    protected $awayTeam;

    

    public function __construct()
    {
        
    }

    public function isBuildable()
    {
        return isset($this->homeTeam, $this->awayTeam);
    }

    /**
     * Get the value of homeTeam
     */ 
    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Set the value of homeTeam
     *
     * @return  self
     */ 
    public function setHomeTeam($homeTeam)
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    /**
     * Get the value of awayTeam
     */ 
    public function getAwayTeam()
    {
        return $this->awayTeam;
    }

    /**
     * Set the value of awayTeam
     *
     * @return  self
     */ 
    public function setAwayTeam($awayTeam)
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    protected function resolveGround($homeTeam)
    {
        
    }
}
