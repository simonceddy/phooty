<?php

namespace spec\Phooty\Core;

use Adbar\Dot;
use Phooty\Core\Application;
use PhpSpec\ObjectBehavior;
use Pimple\Container;

class ApplicationSpec extends ObjectBehavior
{
    function let(Dot $config, Container $pimple)
    {
        $this->beConstructedWith($config, $pimple);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Application::class);
    }

    function it_has_access_to_the_config_object()
    {
        $this->config()->shouldBeAnInstanceOf(Dot::class);
    }

    function it_has_an_underlying_pimple_container()
    {
        $this->container()->shouldBeAnInstanceOf(Container::class);
    }
}
