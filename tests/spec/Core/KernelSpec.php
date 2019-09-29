<?php

namespace spec\Phooty\Core;

use Faker\Generator;
use Phooty\Core\Kernel;
use Phooty\Support\Factories\PlayerFactory;
use PhpSpec\ObjectBehavior;
use Pimple\Container;
use Prophecy\Argument;

class KernelSpec extends ObjectBehavior
{
    function it_wraps_pimple_container()
    {
        $this->shouldBeAnInstanceOf(Container::class);
        $this->bind('test', function () {
            return 'test';
        })->get('test')->shouldReturn('test');
    }

    function it_loads_factory_services_and_aliases()
    {
        $this->get('faker')->shouldBeAnInstanceOf(Generator::class);
        $this->get(PlayerFactory::class)->shouldBeAnInstanceOf(PlayerFactory::class);
    }
}
