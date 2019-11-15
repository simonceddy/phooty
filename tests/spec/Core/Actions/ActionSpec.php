<?php

namespace spec\Phooty\Core\Actions;

use Phooty\Core\Actions\Action;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ActionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('TEST');
    }

    function it_has_a_type()
    {
        $this->type()->shouldReturn('TEST');
    }
}
