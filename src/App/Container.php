<?php
namespace Phooty\App;

use Eddy\Path\Path;
use Phooty\Config\Env;
use Phooty\Contracts\App\Container as PhootyContainer;
use Phooty\Config\LoadConfigFromPaths;
use Phooty\Support\Providers\FactoryProvider;
use Pimple\Container as Pimple;
use Symfony\Component\Filesystem\Filesystem;

use function Eddy\Path\locateProjectDir;

class Container extends Pimple implements PhootyContainer
{
    public function __construct()
    {
        $this->registerCoreServices();
        $this->loadProviders();
    }

    private function registerCoreServices()
    {
        $this['path'] = function () {
            return new Path(locateProjectDir());
        };

        $this->offsetSet('env', function () {
            return new Env();
        });
        $this->offsetSet('fs', function () {
            return new Filesystem();
        });
        $this->offsetSet('config', function ($c) {
            return (new LoadConfigFromPaths($c['fs']))->load([
                $c['path']->get('config')
            ]);
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
