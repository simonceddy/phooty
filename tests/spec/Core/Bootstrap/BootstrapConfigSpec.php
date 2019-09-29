<?php

namespace spec\Phooty\Core\Bootstrap;

use Phooty\Core\Bootstrap\BootstrapConfig;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BootstrapConfigSpec extends ObjectBehavior
{
    function it_loads_the_default_config_if_located()
    {
        $this->bootstrap()->get('default')->shouldReturn(true);
    }
}
