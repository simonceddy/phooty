<?php
namespace Phooty\Simulation\Events\Action\Ruck;

use Symfony\Component\EventDispatcher\Event;

class HitoutEvent extends Event
{
    public const NAME = 'a.ruck.hitout';
}
