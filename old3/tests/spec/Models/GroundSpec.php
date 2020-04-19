<?php

namespace spec\Phooty\Models;

use Phooty\Models\Ground;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GroundSpec extends ObjectBehavior
{
    function it_requires_valid_length_and_width()
    {
        $this->beConstructedWith(12, 12);
        $this->length()->shouldReturn(12);
        $this->width()->shouldReturn(12);
    }

    function it_throws_exception_if_given_invalid_dimensions()
    {
        $this->beConstructedWith(-12, -12);
        $this->shouldThrow()->duringInstantiation();
    }
}
