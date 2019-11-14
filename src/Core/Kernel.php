<?php

namespace Phooty\Core;

use Phooty\Contracts\App\Container;

class Kernel
{
    protected $eventLoop;

    protected $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->registerCoreProviders();
    }

    private function registerCoreProviders()
    {
        $this->app->register((new ActionOutcomeProvider()));
    }

    public function eventLoop()
    {
        // TODO: write logic here
        return $this->eventLoop;
    }
}
