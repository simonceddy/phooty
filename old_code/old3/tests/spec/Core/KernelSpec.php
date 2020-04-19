<?php

namespace spec\Phooty\Core;

use Evenement\EventEmitterInterface;
use Phooty\App\Application;
use Phooty\Core\Kernel;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class KernelSpec extends ObjectBehavior
{
    function let(Application $app, EventEmitterInterface $emitter)
    {
        $app->config('core.events', [])->willReturn([]);
        $this->beConstructedWith($app, $emitter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Kernel::class);
    }
}
