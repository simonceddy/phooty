<?php
namespace Phooty\Simulation\Subscribers;

use Symfony\Component\EventDispatcher\Event;
use Phooty\Simulation\Events\Timer;
use Phooty\Simulation\Support\GetStateFrom;

class TimerSubscriber implements Subscriber
{
    public static $listensFor = [
        Timer\TickEvent::NAME => 'onTick',
    ];

    public static function getSubscribedEvents()
    {
        return self::$listensFor;
    }

    /**
     * Run Timer tick events e.g. storing match state, checking for period or
     * match end, etc
     *
     * @param Event $event
     * @return void
     */
    public function onTick(Event $event)
    {
        $event->getStates()[$event->getTimer()->getCurrent()] = GetStateFrom::match(
            $event->getMatch()
        );
    }
}
