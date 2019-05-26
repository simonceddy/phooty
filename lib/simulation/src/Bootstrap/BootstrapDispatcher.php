<?php
namespace Phooty\Simulation\Bootstrap;

use Phooty\Simulation\Dispatcher;
use Phooty\Simulation\Subscribers\MatchSubscriber;
use Phooty\Simulation\Subscribers\TimerSubscriber;

class BootstrapDispatcher
{
    public function bootstrap(Dispatcher $dispatcher)
    {
        $dispatcher->addSubscriber(
            $dispatcher->app()->make(MatchSubscriber::class)
        );        

        $dispatcher->addSubscriber(
            $dispatcher->app()->make(TimerSubscriber::class)
        );

        return $dispatcher;
    }
}
