<?php

namespace spec\Phooty\Core\Entities;

use Phooty\Core\Entities\Sherrin;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SherrinSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Sherrin::class);
    }
}
