<?php

namespace spec\Phooty\Core;

use Phooty\Core\Environment;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EnvironmentSpec extends ObjectBehavior
{
    function it_wraps_the_env_and_server_globals()
    {
        $_ENV['test_val'] = 'Testing!';
        $this->beConstructedWith($_ENV, $_SERVER);
        $this->get('test_val')->shouldReturn('Testing!');
    }
}
