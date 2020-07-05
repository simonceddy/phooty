<?php

namespace spec\Phooty\Testing;

use Faker\Factory;
// use Faker\Generator;
use Phooty\Entities\Player;
use Phooty\Testing\PlayerFactory;
use Phooty\Testing\Factory as PhootyFactory;
use PhpSpec\ObjectBehavior;

class PlayerFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Factory::create());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PlayerFactory::class);
    }

    function it_implements_factory_interface()
    {
        $this->shouldHaveType(PhootyFactory::class);
    }

    function it_creates_a_new_player()
    {
        $this->make()->shouldBeAnInstanceOf(Player::class);
    }

    function it_creates_a_new_player_with_the_given_values()
    {
        $this->make([
            'firstName' => 'Digga'
        ])->firstName()->shouldEqual('Digga');
    }
}
