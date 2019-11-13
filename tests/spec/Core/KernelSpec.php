<?php

namespace spec\Phooty\Core;

use Phooty\Core\Kernel;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KernelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }
}
