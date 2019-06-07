<?php
namespace Phooty\Simulation\Core;

use Phooty\Simulation\Match\MatchContainer;

class PeriodSimulator
{
    /**
     * Has the period sim started
     *
     * @var boolean
     */
    protected $started = false;

    /**
     * Has the period sim finished
     *
     * @var boolean
     */
    protected $finished = false;

    /**
     * The MatchContainer instance
     *
     * @var MatchContainer
     */
    protected $match;

    public function __construct(MatchContainer $match)
    {
        $this->match = $match;
    }

    public function run()
    {
        $this->started = true;
        $period = [];
        while (!$this->finished) {
            $passage = new PassageOfPlay($this->match);
            $passage->run();
            $period[] = $passage;
        }

        return $period;
    }

    public function finish()
    {
        $this->finished = true;
        return $this;
    }

    public function clear()
    {
        $this->started = false;
        $this->finished = false;

        return $this;
    }
}
