<?php
namespace Phooty\Core;

use Evenement\EventEmitter;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class CoreProvider implements ServiceProviderInterface
{
    public function register(Container $c)
    {
        $c[EventEmitter::class] = function () {
            return new EventEmitter();
        };
    }
}
