<?php
namespace Phooty\Core;

use Phooty\Support\ServiceProvider;
use Phooty\Core\Bootstrap\BootstrapTimer;

class CoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Timer::class, function () {
            return (new BootstrapTimer)->bootstrap(
                $this->app->make('config')
            );
        });
    }

    public function provides()
    {
        return [
            Timer::class
        ];
    }
}
