<?php

namespace spec\Phooty\Core\Ai;

use Phooty\Core\Ai\TeamAi;
use PhpSpec\ObjectBehavior;

class TeamAiSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TeamAi::class);
    }
}
