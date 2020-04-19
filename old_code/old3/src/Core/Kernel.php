<?php

namespace Phooty\Core;

use Evenement\EventEmitter;
use Evenement\EventEmitterInterface;
use Phooty\App\Application;
use Phooty\Core\Events\BootstrapEvents;

/**
 * @todo Make Kernel's responsibility specific to sim
 */
class Kernel
{
    protected $app;

    protected $emitter;

    public function __construct(Application $app, EventEmitterInterface $emitter = null)
    {
        $this->app = $app;

        $this->emitter = $emitter ?? $this->app[EventEmitterInterface::class];

        $this->bootstrapEvents();
    }

    private function bootstrapEvents()
    {
        (new BootstrapEvents())->bootstrap(
            $this->emitter,
            $this->app->config('core.events', [])
        );
    }

    public function emitter()
    {
        // TODO: write logic here
        return $this->emitter;
    }
}
