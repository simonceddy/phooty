<?php
namespace Phooty\Core\Support;

use Illuminate\Contracts\Container\Container;
use Phooty\Core\Timer;
use Phooty\Core\Bootstrap\BootstrapTimer;

class RegisterBindings
{
    public function register(Container $container)
    {
        $container->singleton(Timer::class, function () use ($container) {
            return (new BootstrapTimer)->bootstrap(
                $container->make('config')
            );
        });
    }
}
