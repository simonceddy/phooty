<?php
namespace Phooty\Simulation\Events\Action\Umpire;

use Symfony\Component\EventDispatcher\Event;

class PerfectBounceEvent extends Event
{
    public const NAME = 'a.umpire.perfect_bounce';
}
