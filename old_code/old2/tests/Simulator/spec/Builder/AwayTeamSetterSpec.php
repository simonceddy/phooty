<?php

namespace spec\Phooty\Simulator\Builder;

use Phooty\Simulator\Builder\AwayTeamSetter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Phooty\Simulator\MatchBuilder;
use Phooty\Contracts\Simulator\Team;
use Phooty\Contracts\Simulator\Builder;

class AwayTeamSetterSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(MatchBuilder::class);
    }

    function it_sets_the_away_team_and_returns_the_match_builder(Builder $builder, Team $awayTeam)
    {
        $this->beConstructedWith($builder);

        $builder->setAwayTeam($awayTeam)->shouldBeCalled();

        $this->vs($awayTeam)->shouldReturn($builder);
    }
}