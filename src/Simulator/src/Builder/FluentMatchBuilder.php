<?php

namespace Phooty\Simulator\Builder;

use Phooty\Contracts\Simulator\Team;
use Phooty\Contracts\Simulator\Builder;
use Phooty\Contracts\Simulator\Ground;

class FluentMatchBuilder implements Builder
{
    protected $builder;

    public function __construct(Builder $builder = null)
    {
        $this->builder = $builder ?? new MatchBuilder();
    }

    public function match(Team $homeTeam)
    {
        $this->setHomeTeam($homeTeam);
        return (new AwayTeamSetter($this));
    }

    public function setAwayTeam(Team $awayTeam)
    {
        $this->builder->setAwayTeam($awayTeam);
        return $this;
    }

    public function setHomeTeam(Team $homeTeam)
    {
        $this->builder->setHomeTeam($homeTeam);
        return $this;
    }

    public function build()
    {
        
    }

    public function at(Ground $ground)
    {
        return $this->setGround($ground);
    }

    public function setGround(Ground $ground)
    {
        $this->builder->setGround($ground);
        return $this;
    }

    public function getGround()
    {
        return $this->builder->getGround();
    }

    public function getBuilder()
    {
        return $this->builder;
    }
}
