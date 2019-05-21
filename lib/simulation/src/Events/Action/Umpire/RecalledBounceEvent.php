<?php
namespace Phooty\Simulation\Events\Action\Umpire;

use Symfony\Component\EventDispatcher\Event;

class RecalledBounceEvent extends Event
{
    public const NAME = 'a.umpire.recalled_bounce';
}
