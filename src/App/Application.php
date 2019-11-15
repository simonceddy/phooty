<?php
namespace Phooty\App;

use Eddy\Path\Path;
use Phooty\Config\Config;
use Phooty\Config\LoadConfigFromPaths;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\Filesystem\Filesystem;

use function Eddy\Path\locateProjectDir;

/**
 * @todo Reimplement current Container functionality as a decorator instead of
 * inheriting from Pimple.
 */
class Application implements ContainerInterface, \ArrayAccess
{
    /**
     * The Container instance
     *
     * @var Container
     */
    protected $container;

    /**
     * The applications Configuration
     *
     * @var Config
     */
    protected $config;

    /**
     * The application path object
     *
     * @var Path
     */
    protected $path;

    public function __construct(Container $container = null)
    {
        $this->container = $container ?? new Container();

        $this->initCoreServices();
        $this->initConfiguration();

        $this->loadProviders();

        $this->bootApplication();
    }

    private function initCoreServices()
    {
        $this->path = new Path(locateProjectDir());

        $this->bind('path', function () {
            return $this->path;
        });

        $this->bind('fs', function () {
            return new Filesystem();
        });
    }

    private function initConfiguration()
    {
        $this->config = (new LoadConfigFromPaths($this->container['fs']))
            ->load([$this->path('config')]);

        $this->bind('config', function () {
            return $this->config;
        });
    }

    private function loadProviders()
    {
        $providers = $this->config('app.providers', []);

        if ($this->config('app.env') !== 'production') {
            $providers = array_merge(
                $providers,
                $this->config('app.providers-dev', [])
            );
        }

        if (!empty($providers)) {
            $this->addProviders(array_map(function ($provider) {
                if (is_string($provider) && class_exists($provider)) {
                    $provider = new $provider();
                }
                return $provider;
            }, $providers));
        }
    }

    private function bootApplication()
    {
        
    }

    public function container()
    {
        return $this->container;
    }

    /**
     * Access the Applications Config.
     * 
     * If no $id is given it will return the Config instance.
     *
     * @param string|null $id
     * @param mixed $default
     *
     * @return mixed|Config
     */
    public function config(string $id = null, $default = null)
    {
        if ($id === null) {
            return $this->config;
        }
        return $this->config->get($id, $default);
    }

    public function path(string $path = null)
    {
        if ($path === null) {
            return $this->path;
        }
        return $this->path->get($path);
    }

    public function bind($id, callable $concrete, bool $isFactory = false)
    {
        // TODO
        $this->container[$id] = $isFactory
            ? $this->container->factory($concrete)
            : $concrete;

        return $this;
    }

    public function alias(string $alias, $id)
    {
        if ($this->has($alias)) {
            throw new \Exception(
                "{$alias} is already defined!"
            );
        }

        if (!$this->has($id)) {
            throw new \Exception(
                "{$id} is not defined!"
            );
        }

        $this->container[$alias] = function ($c) use ($id) {
            return $c[$id];
        };

        return $this;
    }

    public function get($id)
    {
        return $this->container->offsetGet($id);
    }

    public function has($id)
    {
        return $this->container->offsetExists($id);
    }

    /**
     * Add a provider or an array of providers to the container.
     *
     * @param ServiceProviderInterface|ServiceProviderInterface[] $providers
     *
     * @return self
     */
    public function addProviders($providers)
    {
        if (is_array($providers)) {
            foreach ($providers as $p) {
                $this->container->register($p);
            }
        } else {
            $this->container->register($providers);
        }
        return $this;
    }

    public function offsetExists($id)
    {
        return $this->container->offsetExists($id);
    }

    public function offsetGet($id)
    {
        return $this->container->offsetGet($id);
    }

    public function offsetSet($id, $value)
    {
        $this->container->offsetSet($id, $value);
    }

    public function offsetUnset($id)
    {
        $this->container->offsetUnset($id);
    }

    public function __get($name)
    {
        if ($name === 'container') {
            return $this->container;
        }

        if ($this->has($name)) {
            return $this->get($name);
        }

        throw new \Exception(
            "Unknown property: {$name}"
        );
    }

    public function __set($name, $value)
    {
        if (is_callable($value)) {
            $this->bind($name, $value);
            return;
        }
    }

    public function __call($name, $arguments)
    {
        if (method_exists($this->container, $name)) {
            return call_user_func([$this->container, $name], ...$arguments);
        }

        throw new \Exception(
            "Unknown method: {$name}"
        );
    }
}
