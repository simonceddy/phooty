<?php

namespace spec\Phooty\Simulator\Match;

use Phooty\Simulator\Match\MatchConfig;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Phooty\Contracts\Simulator\Team;
use Phooty\Contracts\Simulator\Ground;

class MatchConfigSpec extends ObjectBehavior
{
    function let(Team $homeTeam, Team $awayTeam, Ground $ground)
    {
        $this->beConstructedWith(
            $homeTeam,
            $awayTeam,
            $ground
        );
    }

    function it_has_a_home_team()
    {
        $this->getHomeTeam()->shouldBeAnInstanceOf(Team::class);
    }

    function it_has_an_away_team()
    {
        $this->getAwayTeam()->shouldBeAnInstanceOf(Team::class);
    }
}
