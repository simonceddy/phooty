<?php

namespace spec\Phooty\Core\Entities;

use Phooty\Core\Entities\MatchPlayer;
use Phooty\Support\Factories\PlayerFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MatchPlayerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith((new PlayerFactory())->create());
    }
}
