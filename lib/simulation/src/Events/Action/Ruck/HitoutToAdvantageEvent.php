<?php
namespace Phooty\Simulation\Events\Action\Ruck;

use Symfony\Component\EventDispatcher\Event;

class HitoutToAdvantageEvent extends Event
{
    public const NAME = 'a.ruck.hitout_to_adv';
}
