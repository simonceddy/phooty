<?php
namespace Phooty\Simulation\Events\Match;

use Symfony\Component\EventDispatcher\Event;

class EndPeriodEvent extends Event
{
    public const NAME = 'match.end_period';
}
