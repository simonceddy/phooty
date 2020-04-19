<?php

namespace spec\Phooty\Ground;

use Phooty\Ground\RowFactory;
use PhpSpec\ObjectBehavior;

class RowFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RowFactory::class);
    }

    function it_creates_the_given_amount_of_rows()
    {
        $this->make(20)->shouldHaveCount(20);
    }

    function it_creates_the_given_amount_of_rows_with_the_given_amount_of_cells()
    {
        $this->make(20, 21)[0]->shouldHaveCount(21);
    }
}
