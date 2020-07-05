<?php

namespace spec\Phooty\Testing\Support;

use Phooty\Testing\Support\TestingProvider;
use PhpSpec\ObjectBehavior;

class TestingProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TestingProvider::class);
    }
}
