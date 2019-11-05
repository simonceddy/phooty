<?php

namespace spec\Phooty\Core;

use Phooty\Core\Kernel;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use React\EventLoop\LoopInterface;

class KernelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }

    function it_is_aware_of_the_event_loop()
    {
        $this->eventLoop()->shouldBeAnInstanceOf(LoopInterface::class);
    }
}
