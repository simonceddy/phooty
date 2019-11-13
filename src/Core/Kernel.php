<?php

namespace Phooty\Core;

class Kernel
{
    protected $eventLoop;

    public function __construct($eventLoop = null)
    {
        $eventLoop === null ?: $this->eventLoop = $eventLoop;
    }

    public function eventLoop()
    {
        // TODO: write logic here
        return $this->eventLoop;
    }
}
