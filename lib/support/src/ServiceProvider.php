<?php
namespace Phooty\Support;

abstract class ServiceProvider
{
    protected $app;

    public function register()
    {
        //
    }

    public function provides()
    {
        return [];
    }
}
