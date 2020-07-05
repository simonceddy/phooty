<?php

namespace spec\Phooty\Entities;

use Phooty\Entities\{
    Player,
    Team,
    TeamPlayer
};
use PhpSpec\ObjectBehavior;

class TeamPlayerSpec extends ObjectBehavior
{
    function let(Team $team, Player $player)
    {
        $this->beConstructedWith(
            11,
            $team,
            $player
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TeamPlayer::class);
    }
}
