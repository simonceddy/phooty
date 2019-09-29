<?php

namespace spec\Phooty\Core\Bootstrap;

use Phooty\Core\Bootstrap\BootstrapEnvironment;
use Phooty\Core\Environment;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BootstrapEnvironmentSpec extends ObjectBehavior
{
    function it_returns_an_object_wrapping_env_and_server_globals()
    {
        $this->bootstrap()->shouldBeAnInstanceOf(Environment::class);
        $_ENV['testing'] = true;
        $this->bootstrap($_ENV)->get('testing')->shouldReturn(true);
    }
}
