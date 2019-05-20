<?php
namespace Phooty\Simulation\Events\Match;

use Symfony\Component\EventDispatcher\Event;

class EndPassageEvent extends Event
{
    public const NAME = 'match.end_passage';
}
