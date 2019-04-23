<?php
namespace Phooty\Foundation;

use Illuminate\Container\Container;

class Application extends Container
{
    private $config;

    private $root_path;

    public function __construct()
    {
        $this->locateRootPath();
        $this->bootstrap();
        $this->registerBindings();
    }

    private function locateRootPath()
    {
        $dir = dirname(__DIR__, 3);
        while (!file_exists($dir.'/composer.json')
            && !file_exists($dir.'/vendor/autoload.php')
            && dirname($dir) !== $dir
        ) {
            $dir = dirname($dir);
        }
        $this->root_path = $dir;
    }

    private function bootstrap()
    {
        $this->config = (new Bootstrap\BootstrapConfig)->bootstrap(
            $this->root_path.'/config'
        );
    }

    private function registerBindings()
    {
        $this->bind('path.root', function () {
            return $this->root_path;
        });

        $this->singleton('config', function () {
            return $this->config;
        });
    }

    public function config()
    {
        return $this->config;
    }
}
