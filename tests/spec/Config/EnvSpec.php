<?php

namespace spec\Phooty\Config;

use Phooty\Config\Env;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EnvSpec extends ObjectBehavior
{
    function it_wraps_env_and_server_globals()
    {
        $this->toArray()->shouldIterateLike(array_merge($_ENV, $_SERVER));
    }
}
