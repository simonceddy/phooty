<?php
namespace Phooty\Simulation\Support\Traits;

use Illuminate\Contracts\Container\Container;

trait AppAware
{
    /**
     * The Container instance
     *
     * @var Container
     */
    protected $app;

    /**
     * Return the container
     *
     * @return Container
     */
    public function app()
    {
        return $this->app;
    }
}
