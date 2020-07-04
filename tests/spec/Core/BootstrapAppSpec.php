<?php

namespace spec\Phooty\Core;

use Phooty\Core\BootstrapApp;
// use Phooty\Core\Configuration;
use PhpSpec\ObjectBehavior;
use Pimple\Container;

class BootstrapAppSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(dirname(__DIR__, 3));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BootstrapApp::class);
    }

    function it_returns_the_bootstrapped_container(Container $app)
    {
        $this->bootstrap($app)->shouldReturn($app);
    }
}
