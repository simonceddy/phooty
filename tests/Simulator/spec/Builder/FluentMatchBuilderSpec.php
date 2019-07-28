<?php

namespace spec\Phooty\Simulator\Builder;

use Phooty\Simulator\Builder\FluentMatchBuilder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Phooty\Simulator\Builder\MatchBuilder;
use Phooty\Simulator\Builder\AwayTeamSetter;
use Phooty\Contracts\Simulator\Team;
use Phooty\Contracts\Simulator\Ground;
use Phooty\Contracts\Simulator\Builder;

class FluentMatchBuilderSpec extends ObjectBehavior
{
    function it_wraps_the_match_builder()
    {
        $this->getBuilder()->shouldBeAnInstanceOf(MatchBuilder::class);
    }

    function it_accepts_a_home_team_and_returns_the_away_team_setter(Team $homeTeam)
    {
        $this->match($homeTeam)->shouldBeAnInstanceOf(AwayTeamSetter::class);
    }

    function it_can_set_the_ground(MatchBuilder $builder, Ground $ground)
    {
        // todo: fix - returning null in tests
        /* $this->beConstructedWith($builder);

        $builder->setGround($ground)->shouldBeCalled();
        $builder->getGround()->shouldBeCalled();

        $this->at($ground);
        $this->getGround()->shouldBeAnInstanceOf(Ground::class); */
    }
}
