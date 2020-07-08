<?php

namespace spec\Phooty\Entities;

use Phooty\Entities\PlayerRatings;
use PhpSpec\ObjectBehavior;

class PlayerRatingsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PlayerRatings::class);
    }
}
