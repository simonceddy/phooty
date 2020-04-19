<?php

namespace Phooty\Core\Events;

class Emitter
{
    protected $events = [];

    public function on(string $name, callable $callback = null)
    {
        // TODO
        $this->events[$name] = $callback;
    }

    public function exists(string $name)
    {
        // TODO: write logic here
        return array_key_exists($name, $this->events);
    }

    public function emit(string $name)
    {
        // TODO: write logic here
    }
}
