<?php

namespace Phooty\Core;

use Phooty\Contracts\App\Container;

/**
 * @todo Make Kernel's responsibility specific to sim
 */
class Kernel
{
    protected $eventLoop;

    protected $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function eventLoop()
    {
        // TODO: write logic here
        return $this->eventLoop;
    }
}
