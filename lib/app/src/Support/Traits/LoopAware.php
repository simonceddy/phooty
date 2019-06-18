<?php
namespace Phooty\App\Support\Traits;

use React\EventLoop\LoopInterface;

trait LoopAware
{
    /**
     * The Event Loop instance
     *
     * @var LoopInterface
     */
    protected $loop;

    /**
     * Get the Event Loop instance
     *
     * @return  LoopInterface
     */ 
    public function getLoop()
    {
        return $this->loop;
    }
}
