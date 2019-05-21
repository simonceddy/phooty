<?php
namespace Phooty\Simulation\Events\Action\Umpire;

use Symfony\Component\EventDispatcher\Event;

class BadBounceEvent extends Event
{
    public const NAME = 'a.umpire.bad_bounce';
}
