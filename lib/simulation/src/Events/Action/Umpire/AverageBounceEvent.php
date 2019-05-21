<?php
namespace Phooty\Simulation\Events\Action\Umpire;

use Symfony\Component\EventDispatcher\Event;

class AverageBounceEvent extends Event
{
    public const NAME = 'a.umpire.average_bounce';
}
