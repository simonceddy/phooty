<?php
namespace Phooty\Simulation\Subscribers;

use Symfony\Component\EventDispatcher\Event;
use Phooty\Simulation\Events\Match;

class MatchSubscriber implements Subscriber
{
    public static $listensFor = [
        Match\EndMatchEvent::NAME => 'onEndMatch',
        Match\EndPeriodEvent::NAME => 'onEndPeriod',
        Match\EndPassageEvent::NAME => 'onEndPassage',
    ];

    public static function getSubscribedEvents()
    {
        return self::$listensFor;
    }

    public function onEndPassage(Event $event)
    {
        // todo
    }
    
    public function onEndPeriod(Event $event)
    {
        // todo
    }

    public function onEndMatch(Event $event)
    {

    }
}
