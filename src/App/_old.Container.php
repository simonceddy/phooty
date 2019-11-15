<?php
namespace Phooty\App;

use Eddy\Path\Path;
use Phooty\Config\Env;
use Phooty\Contracts\App\Container as PhootyContainer;
use Phooty\Config\Config;
use Phooty\Config\LoadConfigFromPaths;
use Phooty\Contracts\App\Provider;
use Phooty\Core\Kernel;
use Phooty\Support\Providers\FactoryProvider;
use Pimple\Container as Pimple;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Filesystem\Filesystem;

use function Eddy\Path\locateProjectDir;

class Container extends Pimple implements PhootyContainer
{
    protected $aliases = [];

    /**
     * The application Config
     *
     * @var Config
     */
    protected $config;

    public function __construct()
    {

        $this->registerCoreServices();

        $this->config = (new LoadConfigFromPaths($this['fs']))->load([
            $this['path']->get('config')
        ]);

        $this['config'] = function () {
            return $this->config;
        };

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

        $this['sim'] = function ($c) {
            return new Kernel($this);
        };
    }

    private function loadProviders()
    {
        $providers = $this->config->get('app.providers', []);
        if (!empty($providers)) {
            foreach ($providers as $provider) {
                if (is_string($provider) && class_exists($provider)) {
                    $provider = new $provider();
                }
                if (!($provider instanceof ServiceProviderInterface)) {
                    throw new \Exception(
                        "Invalid Provider!"
                    );
                }
                $this->register($provider);
            }
        }
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

    public function offsetExists($id)
    {
        if (isset($this->aliases[$id])) {
            $id = $this->aliases[$id];
        }
    
        return parent::offsetExists($id);
    }

    public function offsetGet($id)
    {
        if (isset($this->aliases[$id])) {
            $id = $this->aliases[$id];
        }

        return parent::offsetGet($id);
    }

    public function alias(string $alias, $id)
    {
        if (isset($this->aliases[$alias])
            || isset($this[$alias])
        ) {
            throw new \Exception(
                "{$alias} is already set!"
            );
        }

        if (!isset($this[$id])) {
            throw new \InvalidArgumentException(
                "{$id} is not set in this container!"
            );
        }

        $this->aliases[$alias] = $id;
        return $this;
    }
}
