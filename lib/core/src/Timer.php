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
}
