<?php
namespace Phooty\Simulation\Loops;

use Phooty\Simulation\Support\Timer;

class MatchLoop
{
    protected $timer;

    public function __construct(Timer $timer)
    {
        $this->timer = $timer;
    }

    public function run()
    {

    }
}
