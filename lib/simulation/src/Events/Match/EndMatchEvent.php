<?php
namespace Phooty\Simulation\Events\Match;

use Symfony\Component\EventDispatcher\Event;

class EndMatchEvent extends Event
{
    public const NAME = 'match.end_match';
}
