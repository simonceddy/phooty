<?php

namespace spec\Phooty\Core\Events;

use Phooty\Core\Events\Emitter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmitterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Emitter::class);
    }

    function it_can_register_events()
    {
        $test = function () {
            return true;
        };
        $this->on('test', $test);
        $this->exists('test')->shouldReturn(true);
        $this->emit('test');
    }
}
