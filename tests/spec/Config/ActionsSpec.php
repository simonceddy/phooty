<?php

namespace spec\Phooty\Config;

use Phooty\Config\Actions;
use Phooty\Core\Bootstrap\BootstrapActions;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ActionsSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(['test']);
    }

    function it_has_array_access_to_types()
    {
        $this->offsetGet('test')->shouldReturn('test');
        $this->offsetExists('unset')->shouldBe(false);
    }

    function it_cannot_set_or_unset_values_after_construction()
    {
        $this->offsetSet('testing', 123);
        $this->offsetExists('testing')->shouldBe(false);
        $this->offsetUnset('test');
        $this->offsetExists('test')->shouldBe(true);
    }

    function it_is_created_and_populated_via_actions_bootstrapper()
    {
        $this->beConstructedThrough(function () {
            return (new BootstrapActions())->bootstrap();
        });

        $this->offsetExists('kick')->shouldBe(true);
    }
}
