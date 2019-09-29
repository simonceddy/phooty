<?php

namespace spec\Phooty\Models;

use Phooty\Models\Team;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TeamSpec extends ObjectBehavior
{
    function it_has_a_city_and_a_name()
    {
        $this->beConstructedWith('Testville', 'Testers');
        $this->city()->shouldReturn('Testville');
        $this->name()->shouldReturn('Testers');
    }

    function it_is_invalid_without_a_city_or_name_and_will_throw_exception()
    {
        $this->shouldThrow()->duringInstantiation();
        $this->beConstructedWith(null, null);
    }
}
