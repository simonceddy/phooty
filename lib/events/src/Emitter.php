<?php
namespace Phooty\Events;

class Emitter
{
    protected $events = [];

    public function on(string $event, callable $handler)
    {
        $this->events[$event] = $handler;
    }

    public function emit(string $event)
    {
        if (!isset($this->events[$event])) {
            return false;
        }

        return call_user_func($this->events[$event]);
    }
}
