<?php

namespace Phooty\Simulator\Match;

use Phooty\Contracts\Simulator\Team;
use Phooty\Simulator\Support\Traits\AwareOfTeams;
use Phooty\Contracts\Simulator\Ground;
use Phooty\Simulator\Support\Traits\AwareOfGround;

class MatchConfig
{
    use AwareOfTeams, AwareOfGround;

    public function __construct(
        Team $homeTeam,
        Team $awayTeam,
        Ground $ground,
        $settings = null
    ) {
        $this->homeTeam = $homeTeam;

        $this->awayTeam = $awayTeam;

        $this->ground = $ground;
    }
}
