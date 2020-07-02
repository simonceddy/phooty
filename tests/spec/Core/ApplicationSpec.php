<?php

namespace spec\Phooty\Core;

use Phooty\Core\Application;
use PhpSpec\ObjectBehavior;
use Pimple\Container;

class ApplicationSpec extends ObjectBehavior
{
    function let(Container $pimple)
    {
        $this->beConstructedWith($pimple);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Application::class);
    }

    function it_has_an_underlying_pimple_container()
    {
        $this->container()->shouldBeAnInstanceOf(Container::class);
    }
}
