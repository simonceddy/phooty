<?php

namespace spec\Phooty\Entities;

use Phooty\Entities\Player;
use PhpSpec\ObjectBehavior;

class PlayerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            'Ben',
            'Rutten'
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }

    function it_has_a_first_and_last_name()
    {
        $this->firstName()->shouldEqual('Ben');
        $this->lastName()->shouldEqual('Rutten');
    }

    function it_returns_nicknames_if_set()
    {
        $this->beConstructedWith('Ben', 'Rutten', ['Big Crunch']);
        $this->nicknames()->shouldContain('Big Crunch');
    }

    function it_returns_null_if_no_nicknames_are_set()
    {
        $this->nicknames()->shouldBeNull();
    }
}
