<?php

namespace spec\Phooty\Core\Bootstrap;

use Phooty\Config\Actions;
use Phooty\Core\Bootstrap\BootstrapActions;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Filesystem\Filesystem;

class BootstrapActionsSpec extends ObjectBehavior
{
    function it_loads_action_config_into_an_actions_object()
    {
        $this->bootstrap()->shouldBeAnInstanceOf(Actions::class);
    }

    /* function it_throws_an_exception_if_actions_config_is_not_found(Filesystem $fs)
    {
        
    } */
}
