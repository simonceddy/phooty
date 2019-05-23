<?php
namespace Phooty\Simulation\Subscribers;

use Symfony\Component\EventDispatcher\Event;
use Phooty\Simulation\Events\Match;
use Illuminate\Contracts\Container\Container;
use Phooty\Simulation\Support\Traits\AppAware;
use Phooty\Simulation\Support\Timer;
use Phooty\Simulation\Support\Traits\TimerAware;

class MatchSubscriber implements Subscriber
{
    use AppAware, TimerAware;

    public static $listensFor = [
        Match\EndMatchEvent::NAME => 'onEndMatch',
        Match\EndPeriodEvent::NAME => 'onEndPeriod',
        Match\EndPassageEvent::NAME => 'onEndPassage',
    ];

    private $sim;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

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
        isset($this->timer) ?: $this->timer = $this->app->make(Timer::class);
        dd($this->timer->getResets());
    }

    public function onEndMatch(Event $event)
    {

    }
}
