<?php

namespace spec\Phooty\Models;

use Phooty\Models\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PlayerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Martin', 'Testin', ['Testy']);
    }

    function it_has_a_name()
    {
        $this->surname()->shouldReturn('Martin');
        $this->givenNames()->shouldReturn('Testin');
    }

    function it_can_have_nicknames()
    {
        $this->nicknames()->shouldReturn(['Testy']);
        $this->nickname()->shouldReturn('Testy');
    }

    function it_is_invalid_without_a_surname_and_will_throw_exception()
    {
        # code...
        $this->beConstructedWith();
        $this->shouldThrow()->duringInstantiation();
    }
}
