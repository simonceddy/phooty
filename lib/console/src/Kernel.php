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

        $this->registerDefaultCommands();

        $this->registerCommands();
    }

    private function registerDefaultCommands()
    {
        $this->addCommands([
            new Commands\WelcomeCommand()
        ]);

        $this->setDefaultCommand('welcome');
    }

    private function registerCommands()
    {
        // get commands from config
        $commands = $this->config->get('phooty.console.commands');
        
        foreach ($commands as $command) {
            $this->add($this->app->make($command));
        }
    }
}
