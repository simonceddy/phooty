<?php

namespace spec\Phooty\Simulator\Builder;

use Phooty\Simulator\Builder\MatchBuilder;
use Phooty\Contracts\Simulator\Builder;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Phooty\Contracts\Simulator\Team;
use Phooty\Simulator\Builder\AwayTeamSetter;
use Phooty\Simulator\Match\MatchConfig;
use Phooty\Contracts\Simulator\Ground;

class MatchBuilderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MatchBuilder::class);
    }

    function it_can_set_the_home_team(Team $homeTeam)
    {
        $this->setHomeTeam($homeTeam)->getHomeTeam()->shouldBeEqualTo($homeTeam);
    }

    function it_can_set_the_away_team(Team $awayTeam)
    {
        $this->setAwayTeam($awayTeam)->getAwayTeam()->shouldBeEqualTo($awayTeam);
    }

    function it_builds_a_match_config_object_if_valid_or_fails(Team $homeTeam, Team $awayTeam)
    {
        $this->shouldThrow()->duringBuild();

        $this->setHomeTeam($homeTeam)->setAwayTeam($awayTeam);

        $this->build()->shouldBeAnInstanceOf(MatchConfig::class);
    }

    function it_can_set_the_ground(Ground $ground)
    {
        $this->setGround($ground);
        $this->getGround()->shouldReturn($ground);
    }
}
