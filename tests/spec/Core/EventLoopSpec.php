<?php

namespace spec\Phooty\Core;

use Phooty\Core\EventLoop;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventLoopSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(EventLoop::class);
    }
}
