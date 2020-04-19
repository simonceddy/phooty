<?php

namespace spec\Phooty\Ground;

use Ds\Set;
use Phooty\Ground\Grid;
use PhpSpec\ObjectBehavior;

class GridSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(64, 64, []);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Grid::class);
    }

    function it_has_width()
    {
        $this->width()->shouldReturn(64);
    }

    function it_has_length()
    {
        $this->length()->shouldReturn(64);
    }

    function it_wraps_a_set_of_rows()
    {
        $this[12]->shouldBeAnInstanceOf(Set::class);
    }
}
