<?php
namespace Phooty\Simulation\Events\Timer;

use Symfony\Component\EventDispatcher\Event;
use Phooty\Simulation\Support\Timer;

class TickEvent extends Event
{
    public const NAME = 'timer.tick';

    private $timer;

    private $pl;

    public function __construct(Timer $timer)
    {
        $this->timer = $timer;

        $this->pl = $this->timer->getPeriodLength();
    }

    public function isPeriodComplete()
    {
        if ($this->timer->getCurrent() > $this->pl) {
            $this->timer->reset();
        }
    }

    public function isMatchComplete()
    {
        
    }
}
