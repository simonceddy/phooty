<?php

namespace spec\Phooty\Core;

use Phooty\App\Container;
use Phooty\Core\Kernel;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KernelSpec extends ObjectBehavior
{
    function let(Container $container)
    {
        $this->beConstructedWith($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }
}
