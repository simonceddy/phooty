<?php
namespace Phooty\Core;

use Adbar\Dot;
use Pimple\Container;

class Application
{
    protected Container $pimple;

    protected Dot $config;

    public function __construct(Dot $config, Container $pimple = null)
    {
        $this->config = $config;
        $this->pimple = $pimple ?? new Container();

        $this->registerCoreServices();
    }

    private function registerCoreServices()
    {
        $this->pimple['config'] = function () {
            return $this->config;
        };
    }

    /**
     * Get the underlying Pimple Container instance
     * 
     * @return Container
     */ 
    public function container()
    {
        return $this->pimple;
    }

    /**
     * Get the Applications Configuration instance.
     * 
     * Config is stored in an instance of Dot.
     *
     * @return Dot
     */
    public function config()
    {
        return $this->config;
    }
}
