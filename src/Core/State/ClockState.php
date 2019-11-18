<?php
namespace Phooty\Core\State;

use Phooty\Core\Clock;

class ClockState
{
    protected $current;

    protected $period;

    public function __construct(Clock $clock)
    {
        $this->current = $clock->currentTime();
        $this->period = $clock->currentPeriod();
    }

    public function __get($name)
    {
        switch ($name) {
            case 'current':
                return $this->current;
            case 'period':
                return $this->period;
        }

        throw new \Exception("Undefined property: {$name}");
    }
}
