<?php

namespace spec\Phooty\Testing;

use Faker\Factory;
use Phooty\Entities\Team;
use Phooty\Testing\TeamFactory;
use Phooty\Testing\Factory as PhootyFactory;
use PhpSpec\ObjectBehavior;

class TeamFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Factory::create());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TeamFactory::class);
    }

    function it_implements_factory_interface()
    {
        $this->shouldHaveType(PhootyFactory::class);
    }

    function it_creates_a_new_team()
    {
        $this->make()->shouldBeAnInstanceOf(Team::class);
    }

    function it_creates_a_new_team_with_the_given_values()
    {
        $this->make([
            'city' => 'freo',
            'name' => 'dockas',
            'nicknames' => ['Fremantle']
        ])->name()->shouldEqual('dockas');
    }
}
