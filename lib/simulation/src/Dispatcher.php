<?php
namespace Phooty\Simulation;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Illuminate\Contracts\Container\Container;
use Phooty\Simulation\Support\Traits\AppAware;

class Dispatcher extends EventDispatcher
{
    use AppAware;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function dispatch($eventName, $event = null)
    {
        if (is_string($event) && class_exists($event)) {
            $event = $this->app->make($event);
        }

        return parent::dispatch($eventName, $event);
    }
}
