<?php

namespace spec\Phooty\Entities;

use Phooty\Entities\Team;
use PhpSpec\ObjectBehavior;

class TeamSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            'freo',
            'dockas'
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Team::class);
    }

    function it_has_a_city()
    {
        $this->city()->shouldEqual('freo');
    }

    function it_has_a_name()
    {
        $this->name()->shouldEqual('dockas');
    }
}
