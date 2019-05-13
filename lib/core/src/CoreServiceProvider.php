<?php
namespace Phooty\Core;

use Phooty\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Timer::class, function () {
            return new Timer(
                $this->app->make('config')->get('phooty.sim.period_length')
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
