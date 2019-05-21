<?php
namespace Phooty\Simulation\Events\Action\Umpire;

use Symfony\Component\EventDispatcher\Event;

class GoodBounceEvent extends Event
{
    public const NAME = 'a.umpire.good_bounce';
}
