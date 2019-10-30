<?php
namespace Phooty\Core;

use Phooty\Config\Env;
use Phooty\Contracts\Core\Container as PhootyContainer;
use Phooty\Core\Bootstrap\BootstrapConfig;
use Phooty\Support\Providers\FactoryProvider;
use Pimple\Container;
use Symfony\Component\Filesystem\Filesystem;

/**
 * TODO: move into app namespace - not essential to sim
 */
class Kernel extends Container implements PhootyContainer
{
    public function __construct()
    {
        $this->registerCoreServices();
        $this->loadProviders();
    }

    private function registerCoreServices()
    {
        $this->offsetSet('env', function () {
            return new Env();
        });
        $this->offsetSet('fs', function () {
            return new Filesystem();
        });
        $this->offsetSet('config', function ($c) {
            return (new BootstrapConfig($c['fs']))->bootstrap();
        });
    }

    private function loadProviders()
    {
        (new FactoryProvider())->register($this);
    }

    public function get($id)
    {
        return $this->offsetGet($id);
    }

    public function has($id)
    {
        return $this->offsetExists($id);
    }

    public function bind($id, callable $closure)
    {
        $this->offsetSet($id, $closure);
        return $this;
    }
}