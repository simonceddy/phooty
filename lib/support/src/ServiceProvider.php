<?php
namespace Phooty\Support;

use Illuminate\Contracts\Container\Container;

abstract class ServiceProvider
{
    protected $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function register()
    {
        //
    }

    public function provides()
    {
        return [];
    }
}
