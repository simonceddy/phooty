<?php
namespace Phooty\Core\Event;

class Emitter
{
    protected $events = [];

    protected $listeners = [];

    public function addListener(Listener $listener)
    {
        $this->listeners[] = $listener;
    }

    public function on(string $event, callable $handler)
    {
        $this->events[$event] = $handler;
        return $this;
    }

    public function emit(string $event)
    {
        if (!isset($this->events[$event])) {
            return false;
        }

        return call_user_func($this->events[$event]);
    }
}
