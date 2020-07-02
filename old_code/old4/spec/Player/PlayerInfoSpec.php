<?php

namespace spec\Phooty\Player;

use Phooty\Player\PlayerInfo;
use PhpSpec\ObjectBehavior;

class PlayerInfoSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PlayerInfo::class);
    }
}
