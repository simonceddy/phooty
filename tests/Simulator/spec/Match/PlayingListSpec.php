<?php

namespace spec\Phooty\Simulator\Match;

use Phooty\Simulator\Match\PlayingList;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PlayingListSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PlayingList::class);
    }
}
