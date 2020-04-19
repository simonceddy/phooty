<?php

namespace spec\Phooty\Support\Factories;

use Phooty\Support\Factories\PlayerFactory;
use Phooty\Contracts\Factory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PlayerFactorySpec extends ObjectBehavior
{
    function it_should_generate_a_first_and_last_name_if_none_provided()
    {
        $this->create()->surname()->shouldBeString();
    }

    function it_can_generate_nicknames()
    {
        $this->create([], ['makeNicknames' => 2])->nicknames()->shouldHaveCount(2);
    }
}
