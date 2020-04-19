<?php

namespace spec\Phooty;

use Phooty\Ground;
use Phooty\Ground\Grid;
use PhpSpec\ObjectBehavior;

class GroundSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Ground::class);
    }

    function it_has_a_grid()
    {
        $this->grid()->shouldBeAnInstanceOf(Grid::class);
    }
}
