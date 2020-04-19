<?php

namespace Phooty\Core;

use Evenement\EventEmitterInterface;

class Clock
{
    protected $total = 0;

    protected $current = 0;

    protected $currentPeriod = 1;

    protected $perPeriod;

    protected $periods;

    /**
     * The EventEmitter
     *
     * @var EventEmitterInterface
     */
    protected $emitter;

    public function __construct(EventEmitterInterface $emitter, int $periods = null, int $perPeriod = null)
    {
        $this->emitter = $emitter;
        $this->periods = $periods ?? 4;
        $this->perPeriod = $perPeriod ?? 120000;
    }

    public function currentTime()
    {
        return $this->current;
    }

    public function tick(int $amount = 1)
    {
        $excess = false;

        if ($amount / $this->perPeriod >= 1.2) {
            $excess = $amount - $this->perPeriod;
            $amount = $this->perPeriod;
        }

        $this->current += $amount;
        $this->total += $amount;
        if ($this->current >= $this->perPeriod) {
            // handle next period
            $this->resetTime();
            $this->currentPeriod++;
            $this->emitter->emit('period.end');

            if ($this->currentPeriod > $this->periods) {
                $this->emitter->emit('match.end');
            } elseif ($excess !== false) {
                $this->tick($excess);
            }
        }
        return $this;
    }

    public function resetTime()
    {
        $this->current = 0;
        return $this;
    }

    public function totalTime()
    {
        return $this->total;
    }

    public function currentPeriod()
    {
        return $this->currentPeriod;
    }
}
