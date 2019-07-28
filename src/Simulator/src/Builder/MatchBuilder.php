<?php
namespace Phooty\Simulator\Builder;

use Phooty\Contracts\Simulator\Builder;
use Phooty\Simulator\Match\MatchConfig;
use Phooty\Contracts\Simulator\Ground as GroundContract;
use Phooty\Simulator\Support\Traits\AwareOfTeams;
use Phooty\Contracts\Simulator\Team;
use Phooty\Simulator\Match\Ground;
use Phooty\Simulator\Support\Traits\AwareOfGround;

class MatchBuilder implements Builder
{
    use AwareOfTeams, AwareOfGround;

    public function build()
    {
        if (!isset($this->homeTeam, $this->awayTeam)) {
            throw new \Exception('Both a home team and away team need to be set!');
        }

        if (!isset($this->ground)) {
            $this->ground = new Ground();
        }

        return new MatchConfig($this->homeTeam, $this->awayTeam, $this->ground);
    }

    /**
     * Set the Ground
     *
     * @param  GroundContract  $ground  The Ground
     *
     * @return  self
     */ 
    public function setGround(GroundContract $ground)
    {
        $this->ground = $ground;

        return $this;
    }

    /**
     * Set the Home Team
     *
     * @param  Team  $homeTeam  The Home Team
     *
     * @return  self
     */ 
    public function setHomeTeam(Team $homeTeam)
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }
    
    /**
     * Set the Away Team
     *
     * @param  Team  $awayTeam  The Away Team
     *
     * @return  self
     */ 
    public function setAwayTeam(Team $awayTeam)
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }
}
