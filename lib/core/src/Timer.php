<?php
namespace Phooty\Core;

class Timer
{
    protected $periodLength;

    protected $current = 0;

    public function __construct(int $periodLength)
    {
        if (1 > $periodLength) {
            throw new \InvalidArgumentException(
                'Period length must be 1 or greater. '.$periodLength.' given.'
            );
        }
        $this->periodLength = $periodLength;
    }

    public function current()
    {
        return $this->current;
    }

    public function periodLength()
    {
        return $this->periodLength;
    }

    public function tick(int $ms = 1)
    {
        $this->current += $ms;
        return $this;
    }

    public function reset()
    {
        $this->current = 0;
        return $this;
    }
}
