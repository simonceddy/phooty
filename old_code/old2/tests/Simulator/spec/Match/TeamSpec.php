<?php

namespace spec\Phooty\Simulator\Match;

use Phooty\Simulator\Match\Team;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TeamSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
            'city' => 'Ventnor',
            'name' => 'Bests',
            'short' => 'VNT'
        ]);
    }

    function it_has_a_team_name()
    {
        $this->name()->shouldReturn('Bests');
    }

    function it_has_a_city()
    {
        $this->city()->shouldReturn('Ventnor');
    }

    function it_has_a_shorthand_name()
    {
        $this->short()->shouldReturn('VNT');
    }
}
