<?php
namespace Phooty\Simulation\Support;

use Symfony\Component\EventDispatcher\Event;
use Phooty\Simulation\Dispatcher;

class Emitter
{
    protected $dispatcher;

    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function emit(string $name, Event $event = null)
    {
        return $this->dispatcher->dispatch($name, $event);
    }
}
