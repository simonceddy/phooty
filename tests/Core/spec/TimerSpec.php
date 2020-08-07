<?php

namespace spec\Phooty\Core;

use Phooty\Core\Event\TimeEvent;
use Phooty\Core\Timer;
use PhpSpec\ObjectBehavior;

class TimerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Timer::class);
    }

    function it_starts_at_0()
    {
        $this->current()->shouldReturn(0);
    }

    function it_can_move_forward_by_the_given_amount()
    {
        $this->tick(23);
        $this->current()->shouldReturn(23);
    }

    function it_can_be_reset()
    {
        $this->tick(23);
        $this->current()->shouldReturn(23);
        $this->reset();
        $this->current()->shouldReturn(0);
    }

    function it_can_run_an_array_of_callbacks_after_a_given_amout(TimeEvent $test)
    {
        $test->__invoke($this)->shouldBeCalled();
        $this->runAt(23, [$test]);

        $this->tick(23);
    }
}
