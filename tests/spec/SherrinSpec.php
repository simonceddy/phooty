<?php

namespace spec\Phooty;

use Phooty\Sherrin;
use PhpSpec\ObjectBehavior;

class SherrinSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Sherrin::class);
    }
}
