<?php

namespace spec\Phooty\Simulator\Match;

use Phooty\Simulator\Match\Ground;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GroundSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(123, 123);
    }

    function it_has_dimensions()
    {
        $this->width()->shouldReturn(123);
        $this->height()->shouldReturn(123);
    }
}
