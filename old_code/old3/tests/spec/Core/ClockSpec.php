<?php

namespace spec\Phooty\Core;

use Evenement\EventEmitterInterface;
use Phooty\Core\Clock;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClockSpec extends ObjectBehavior
{
    function let(EventEmitterInterface $emitter)
    {
        $this->beConstructedWith($emitter);
    }

    function it_starts_at_zero()
    {
        $this->currentTime()->shouldReturn(0);
    }

    function it_can_increment_by_given_amount()
    {
        $this->tick(1000);
        $this->currentTime()->shouldReturn(1000);
    }

    function it_knows_the_current_period()
    {
        $this->tick(140000);
        $this->currentPeriod()->shouldReturn(2);
    }

    function it_emits_an_event_on_period_end(EventEmitterInterface $emitter)
    {
        $this->beConstructedWith($emitter, 4, 120000);
        $emitter->emit('period.end')->shouldBeCalled();
        $this->tick(120120);
    }

    function it_emits_an_event_on_match_end(EventEmitterInterface $emitter)
    {
        $this->beConstructedWith($emitter, 4, 100);
        $emitter->emit('period.end')->shouldBeCalled();
        $emitter->emit('match.end')->shouldBeCalled();
        $this->tick(1000);
    }

}
