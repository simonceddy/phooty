<?php

namespace Phooty\Simulator\Builder;

use Phooty\Contracts\Simulator\Builder;
use Phooty\Contracts\Simulator\Team;

class AwayTeamSetter
{
    protected $matchBuilder;

    public function __construct(Builder $matchBuilder)
    {
        $this->matchBuilder = $matchBuilder;
    }

    /**
     * Sets the away team and returns the Match Builder.
     *
     * @param Team $awayTeam
     *
     * @return Builder
     */
    public function vs(Team $awayTeam)
    {
        $this->matchBuilder->setAwayTeam($awayTeam);
        return $this->matchBuilder;
    }
}
