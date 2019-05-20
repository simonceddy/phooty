<?php
namespace Phooty\Simulation\Events\Timer;

use Symfony\Component\EventDispatcher\Event;

class TickEvent extends Event
{
    public const NAME = 'timer.tick';
}
