<?php
namespace Phooty\Simulation\Core;

use Phooty\Simulation\Support\Stats;
use Phooty\Simulation\Match\MatchContainer;

class PassageOfPlay
{
    protected $actions = [];

    protected $match;

    protected $finished = false;

    public function __construct(MatchContainer $match)
    {
        $this->match = $match;
    }

    public function run()
    {
        $timer = $this->match->getTimer();
        $stats = Stats::all();
        while (!$this->finished) {
            $this->actions[] = array_random($stats);
            $timer->tick(mt_rand(100, 1000));
            if (5 === mt_rand(0, 5)) {
                $this->finish();
            }
        }

        return $this;
    }

    public function finish()
    {
        $this->finished = true;

        return $this;
    }
}
