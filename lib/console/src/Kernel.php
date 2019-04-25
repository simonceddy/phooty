<?php
namespace Phooty\Console;

use Symfony\Component\Console\Application;
use Illuminate\Contracts\Container\Container;

class Kernel extends Application
{
    private $app;

    private $config;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->config = $app->make('config');
        parent::__construct(
            $this->config->get('phooty.app.name'),
            $this->config->get('phooty.app.version')
        );

        $this->registerCommands();
    }

    private function registerCommands()
    {
        
    }
}
