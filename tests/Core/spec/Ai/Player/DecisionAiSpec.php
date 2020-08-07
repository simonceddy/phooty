<?php

namespace spec\Phooty\Core\Ai\Player;

use Phooty\Core\Ai\Player\DecisionAi;
use PhpSpec\ObjectBehavior;

class DecisionAiSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DecisionAi::class);
    }
}
