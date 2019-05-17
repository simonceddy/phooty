<?php
namespace Phooty\Core;

use Phooty\Core\Event\Emitter;
use Illuminate\Contracts\Container\Container;

class Simulation extends Emitter
{
    protected $container;

    protected $config;

    protected $timer;

    protected $max_periods;

    protected $period = 0;

    protected $started = false;

    protected $finished = false;

    public function __construct(Container $container, Timer $timer)
    {
        $this->container = $container;
        $this->timer = $timer;
        $this->loadConfig();
        $this->initEvents();
    }

    private function loadConfig()
    {
        $this->config = $this->container->make('config');

        $this->max_periods = $this->config->get('phooty.sim.periods');
    }

    private function initEvents()
    {
        $this->on('endMatch', function () {
            $this->finished = true;
        });

        $this->on('endPeriod', function () {
            $this->timer->reset();
            $this->period++;

            if ($this->max_periods <= $this->period) {
                $this->emit('endMatch');
            }
        });
    }

    public function timer()
    {
        return $this->timer;
    }

    public function run()
    {
        if ($this->started) {
            return;
        }
        $result = [];
        $this->started = true;
        while (!$this->finished) {
            while ($this->timer->current() < $this->timer->periodLength()) {
                $this->timer->tick(mt_rand(1, 8923));
                $result[] = ($this->period + 1) . 'th! - ' . $this->timer->current();
            }
            $this->emit('endPeriod');
        }
        return $result;
    }
}
