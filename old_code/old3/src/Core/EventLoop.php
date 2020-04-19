<?php
namespace Phooty\Core;

class EventLoop
{
    protected $listener;

    protected $started = false;

    protected $running = false;

    protected $finished = false;

    public function start()
    {
        $this->started = true;
        $this->running = true;
    }

    public function pause()
    {
        $this->running = false;
    }

    public function stop()
    {
        $this->running = false;
        $this->finished = true;
    }

    /**
     * is started
     * 
     * @return bool
     */ 
    public function isStarted()
    {
        return $this->started;
    }
 
    /**
     * is running
     * 
     * @return bool
     */ 
    public function isRunning()
    {
        return $this->running;
    }

    /**
     * is finished
     * 
     * @return bool
     */ 
    public function isFinished()
    {
        return $this->finished;
    }
}
