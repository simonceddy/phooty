<?php

namespace spec\Phooty\App;

use Faker\Generator;
use Phooty\App\Container;
use Phooty\Support\Factories\PlayerFactory;
use PhpSpec\ObjectBehavior;
use Pimple\Container as Pimple;
use Prophecy\Argument;

class ContainerSpec extends ObjectBehavior
{
    function it_wraps_pimple_container()
    {
        $this->shouldBeAnInstanceOf(Pimple::class);
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
