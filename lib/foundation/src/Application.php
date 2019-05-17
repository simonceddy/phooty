<?php
namespace Phooty\Foundation;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\Container as IlluminateContainer;
use Phooty\Config\Config;
use Phooty\Config\Drivers as ConfigDriver;
use Phooty\Foundation\Support\HasProviders;
use Phooty\Support\ServiceProvider;
use Phooty\Console\Kernel;
use Symfony\Component\Console\Application as SymfApplication;

/**
 * The Application instance
 * 
 * @todo Fix bootstrapping process
 */
class Application extends Container
{
    use HasProviders;

    /**
     * The Application Config instance
     *
     * @var \Phooty\Config\Config
     */
    private $config;

    /**
     * The Application Path instance
     *
     * @var Path
     */
    private $path;

    /**
     * Is Phooty installed yet
     *
     * @var boolean
     */
    private $is_installed;

    public function __construct(array $options = [])
    {
        $this->initPath();

        $this->is_installed = $this->getInstallStatus();
        
        $this->preboot($options);

        $this->registerBindings();
        
        $this->registerProviders();

        $this->alias(Kernel::class, SymfApplication::class);
    }

    private function getInstallStatus(): bool
    {
        return Support\CheckInstallStatus::check($this->path('home'));
    }

    private function initPath()
    {
        $this->path = (new Bootstrap\BootstrapPath())->bootstrap();
    }

    private function preboot(array $options)
    {
        $this->config = (new Bootstrap\BootstrapConfig(
            $options['config_drivers'] ?? [
                'php' => ConfigDriver\PhpFileDriver::class,
                'json' => ConfigDriver\JsonFileDriver::class,
                'yaml' => ConfigDriver\YamlFileDriver::class,
                'yml' => ConfigDriver\YamlFileDriver::class,
            ]
        ))->bootstrap(
            $this->path->get('config')
        );

    }

    private function registerBindings()
    {
        $this->bind(IlluminateContainer::class, function () {
            return $this;
        });

        $this->bind('path', function () {
            return $this->path;
        });

        $this->bind('path.config', function () {
            return $this->path->get('config');
        });

        if ($this->path->hasBound('home')) {
            $this->bind('path.home', function () {
                return $this->path->get('home');
            });
        }

        $this->instance(Config::class, $this->config);

        $this->alias(Config::class, 'config');

        $this->instance(static::class, $this);
    }

    /**
     * @todo Make better
     *
     * @return void
     */
    private function registerProviders()
    {
        $providers = $this->config('phooty.app.providers') ?? [];
        foreach ($providers as $provider) {
            if (!class_exists($provider)
                || !((new \ReflectionClass($provider))->isSubclassOf(ServiceProvider::class))
            ) {
                throw new \LogicException('Invalid provider:' . $provider);
            }
            (new $provider($this))->boot();
        }
    }

    /**
     * Get the Application Path object.
     * 
     * An optional argument can be given to directly use the Path object's get()
     * method.
     *
     * @param string $path  Optional path or shortcut to resolve
     * @return string|Path
     */
    public function path(string $path = null)
    {
        if (null !== $path) {
            return $this->path->get($path);
        }
        return $this->path;
    }

    /**
     * Returns the Application's Config instance.
     * 
     * If one argument is given it will be treated as the Config key and will
     * attempt to return the key's value.
     * 
     * If two arguments are given they are treated as a key => value pair and
     * passed to the Config object's set() method.
     *
     * @param string $key The Config key (optional)
     * @param mixed $val The value of Config key (optional)
     * @return mixed|Config
     */
    public function config(string $key = null, $val = null)
    {
        if (null !== $key) {
            if (null === $val) {
                return $this->config->get($key);
            } else {
                $this->config->set($key, $val);
            }
        }
        
        return $this->config;
    }

    public function isInstalled(): bool
    {
        return $this->is_installed;
    }

    public function getHomeDir()
    {
        return $this->path('home');
    }
}
