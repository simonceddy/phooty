<?php

namespace spec\Phooty\Core\Ai;

use Phooty\Core\Ai\MatchAi;
use PhpSpec\ObjectBehavior;

class MatchAiSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(MatchAi::class);
    }
}
