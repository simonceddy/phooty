<?php

namespace spec\Phooty\Ground;

use Phooty\Ground\Cell;
use PhpSpec\ObjectBehavior;

class CellSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(12, 65);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Cell::class);
    }

    function it_has_coordinates()
    {
        $this->getX()->shouldReturn(65);
        $this->getY()->shouldReturn(12);
    }
}
