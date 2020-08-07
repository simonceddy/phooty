<?php
namespace Phooty\Core\Event;

use Phooty\Core\Timer;

interface TimeEvent
{
    public function __invoke(Timer $timer);
}
