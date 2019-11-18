<?php

namespace spec\Phooty\Core\State;

use Phooty\Core\Clock;
use Phooty\Core\State\ClockState;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClockStateSpec extends ObjectBehavior
{
    function let(Clock $clock)
    {
        $this->beConstructedWith($clock);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ClockState::class);
    }
}
