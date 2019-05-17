<?php
namespace Phooty\Foundation\Installer;

use Phooty\Foundation\Application;

class PreInstaller
{
    /**
     * The Application instance
     *
     * @var Application
     */
    protected $app;

    private $install_dir;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    private function createPhootyDir()
    {
        $dir = $this->app->getHomeDir();
        is_dir($dir.'/.phooty') ?: mkdir($dir.'/.phooty');
        $this->install_dir = $dir.'/.phooty';
    }

    private function prepareConfigDir()
    {
        is_dir($this->install_dir.'/config') ?: mkdir($this->install_dir.'/config');
    }

    public function prepare(array $options = [])
    {
        $this->createPhootyDir();
        $this->prepareConfigDir();
        return new Installer($this->app, $this->install_dir);
    }
}
