<?php
namespace Phooty\Foundation\Installer;

use Phooty\Foundation\Application;

class Installer
{
    /**
     * The Application instance
     *
     * @var Application
     */
    protected $app;

    private $install_dir;

    public function __construct(Application $app, string $install_dir)
    {
        $this->app = $app;
        $this->install_dir = $install_dir;
    }
    
    public function install(array $options = [])
    {
        
    }
}
