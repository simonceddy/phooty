<?php

namespace Phooty\Core;

use React\EventLoop\LoopInterface;

class Kernel
{
    /**
     * The Event Loop instance
     *
     * @var LoopInterface
     */
    protected $eventLoop;

    public function __construct(LoopInterface $eventLoop = null)
    {
        $this->eventLoop = $eventLoop ?? \React\EventLoop\Factory::create();
    }

    public function eventLoop()
    {
        // TODO: write logic here
        return $this->eventLoop;
    }
}
