<?php

namespace spec\Phooty\Testing;

use Phooty\Testing\PlayerRatingsFactory;
use PhpSpec\ObjectBehavior;

class PlayerRatingsFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PlayerRatingsFactory::class);
    }
}
