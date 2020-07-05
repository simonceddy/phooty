<?php

namespace spec\Phooty\Entities;

use Phooty\Entities\TeamPlayer;
use PhpSpec\ObjectBehavior;

class TeamPlayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TeamPlayer::class);
    }
}
