<?php

namespace spec\Phooty\Entities;

use Phooty\Entities\{
    Player,
    PlayerInfo,
    PlayerRatings,
};
use PhpSpec\ObjectBehavior;

class PlayerSpec extends ObjectBehavior
{
    function let(PlayerInfo $info, PlayerRatings $ratings)
    {
        $this->beConstructedWith($info, $ratings);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }

    function it_has_player_info()
    {
        $this->info()->shouldBeAnInstanceOf(PlayerInfo::class);
    }

    function it_has_player_ratings()
    {
        $this->ratings()->shouldBeAnInstanceOf(PlayerRatings::class);
    }
}
