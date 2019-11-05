<?php

namespace spec\Phooty\Core;

use Phooty\Core\Action;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ActionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('TEST');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Action::class);
    }

    function it_has_a_type()
    {
        $this->type()->shouldReturn('TEST');
    }
}
