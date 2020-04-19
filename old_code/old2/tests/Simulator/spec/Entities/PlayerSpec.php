<?php

namespace spec\Phooty\Simulator\Entities;

use Phooty\Simulator\Entities\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PlayerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(11, 'Testman', 'Mister Doctor');
    }

    function it_has_a_number()
    {
        $this->number()->shouldReturn(11);
    }

    function it_can_be_constructed_with_optional_nicknames()
    {
        $this->beConstructedWith(11, 'Testman', 'Mister Doctor', [
            'nicknames' => 'Scooba'
        ]);
        $this->nicknames()->shouldReturn('Scooba');
    }
}
