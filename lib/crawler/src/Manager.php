<?php
namespace Phooty\Crawler;

use Illuminate\Contracts\Container\Container;
use Illuminate\Container\Container as IlluminateContainer;

class Manager
{
    private $container;

    public function __construct(Container $container = null)
    {
        $this->container = $container ?? new IlluminateContainer();
        $this->registerBindings();
    }

    private function registerBindings()
    {

    }
}
