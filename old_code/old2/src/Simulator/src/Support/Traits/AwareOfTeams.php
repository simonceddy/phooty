<?php
namespace Phooty\Simulator\Support\Traits;

use Phooty\Contracts\Simulator\Team;

trait AwareOfTeams
{
    /**
     * The Home Team
     *
     * @var Team
     */
    protected $homeTeam;
    
    /**
     * The Away Team
     *
     * @var Team
     */
    protected $awayTeam;

    /**
     * Get the Home Team
     *
     * @return  Team
     */ 
    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Get the Away Team
     *
     * @return  Team
     */ 
    public function getAwayTeam()
    {
        return $this->awayTeam;
    }
}
