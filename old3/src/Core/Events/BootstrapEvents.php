<?php
namespace Phooty\Core\Events;

use Evenement\EventEmitterInterface;
use ReflectionClass;

class BootstrapEvents
{
    public function bootstrap(EventEmitterInterface $emitter, array $events = [])
    {
        // dd(new ReflectionClass($emitter));
        return $emitter;
    }
}
