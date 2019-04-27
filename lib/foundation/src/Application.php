<?php
namespace Phooty\Foundation;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\Container as IlluminateContainer;

class Application extends Container
{
    /**
     * The Application Config instance
     *
     * @var \Phooty\Config\Config
     */
    private $config;

    private $path;

    public function __construct(array $options = [])
    {
        $this->initPath();
        $this->bootstrap($options);
        $this->registerBindings();
    }

    private function initPath()
    {
        $this->path = (new Bootstrap\BootstrapPath())->bootstrap();
    }

    private function bootstrap(array $options)
    {
        $this->config = (new Bootstrap\BootstrapConfig(
            $options['config_drivers'] ?? []
        ))->bootstrap(
            $this->path.'/config'
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

        $this->bind('config', function () {
            return $this->config;
        });
    }

    public function path()
    {
        return $this->path;
    }

    public function config(string $key = null, $val = null)
    {
        if (null !== $key) {
            return null !== $val ? $this->config->set($key, $val) :
                $this->config->get($key);
        }
        
        return $this->config;
    }
}
