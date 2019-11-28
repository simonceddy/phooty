<?php

namespace spec\Phooty\Entities;

use Ds\Vector;
use Phooty\Entities\ActivePlayer;
use Phooty\Models\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ActivePlayerSpec extends ObjectBehavior
{
    function let(Player $player)
    {
        $this->beConstructedWith($player);
    }

    function it_has_a_player_model()
    {
        $this->model()->shouldBeAnInstanceOf(Player::class);
    }

    function it_can_have_coordinates_set()
    {
        $this->moveTo(11, 83);
        $this->getCoordinates()->shouldBeAnInstanceOf(Vector::class);
        $this->getX()->shouldReturn(11);
        $this->getY()->shouldReturn(83);
    }
}
