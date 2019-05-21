<?php
namespace Phooty\Simulation;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Container\Container as IlluminateContainer;

class Kernel
{
    /**
     * The Container/App instance
     *
     * @var Container
     */
    protected $app;

    /**
     * The Config instance
     *
     * @var Config
     */
    protected $config;

    public function __construct(
        Container $container = null,
        $config = null
    ) {
        $this->app = $container ?? new IlluminateContainer;
        
        $this->initConfig($config);

        $this->registerTimer();
    }

    private function initConfig($config = null)
    {
        if (is_array($config)) {
            $this->config = new Support\SimulationConfig($config);
        } elseif (null === $config && $this->app->has(Config::class)) {
            $this->config = $this->app->make(Config::class);
        } else {
            $this->config = $config ?? new Support\SimulationConfig();
        }
    }

    private function registerTimer()
    {
        $this->app->singleton(Support\Timer::class, function () {
            return new Support\Timer(
                $this->config->get('timer.period_length'),
                $this->app->make(Dispatcher::class)
            );
        });
    }
}
