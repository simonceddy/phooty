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
        $timer = $event->timer();
        dump("Period {$timer->getResets()} complete!");
        if ($timer->getResets() >= $event->sim()->getMaxPeriods()) {
            $timer->emit('match.end_match', Match\EndMatchEvent::class);
        }
    }

    public function onEndMatch(Event $event)
    {
        $event->sim()->finish();
        dump("Match finished!");
    }
}
