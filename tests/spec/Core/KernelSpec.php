<?php

namespace spec\Phooty\Core;

use Phooty\Core\Kernel;
use PhpSpec\ObjectBehavior;
use Pimple\Container;
use Prophecy\Argument;

class KernelSpec extends ObjectBehavior
{
    function it_wraps_pimple_container()
    {
        $this->container()->shouldBeAnInstanceOf(Container::class);
        $this->add('test', function () {
            return 'test';
        })->get('test')->shouldReturn('test');
    }
}
