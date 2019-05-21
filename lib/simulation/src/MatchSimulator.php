<?php
namespace Phooty\Simulation;

use Phooty\Simulation\Support\Timer;
use Phooty\Simulation\Generators\PassageGenerator;

class MatchSimulator
{
    protected $timer;

    public function __construct(Timer $timer)
    {
        $this->timer = $timer;
    }

    public function run()
    {
        $generator = new PassageGenerator();

        $results = $generator->generate();

        return $results;
    }
}
