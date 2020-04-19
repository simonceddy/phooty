<?php
namespace Phooty\Core;

use Evenement\EventEmitter;
use Evenement\EventEmitterInterface;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class CoreProvider implements ServiceProviderInterface
{
    public function register(Container $c)
    {
        $c[EventEmitterInterface::class] = function () {
            return new EventEmitter();
        };

        $c[Timer::class] = function () {
            return new Timer();
        };

        $c[Kernel::class] = function ($c) {
            return new Kernel($c['app']);
        };
    }
}
