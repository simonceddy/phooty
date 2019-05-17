<?php
namespace Phooty\App\Console;

use Symfony\Component\Console\Application as SymfApp;
use Illuminate\Contracts\Container\Container;

class Kernel extends SymfApp
{
    private $app;

    private $config;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->config = $app->make('config');
        parent::__construct(
            $this->config->get('phooty.app.name') ?? 'Phooty',
            $this->config->get('phooty.app.version') ?? '0.1.0'
        );

        $this->registerDefaultCommands();

        $this->registerCommands();
    }

    private function registerDefaultCommands()
    {
        $this->addCommands([
            $this->app->make(Commands\WelcomeCommand::class),
            $this->app->make(Commands\InstallCommand::class),
            $this->app->make(Commands\GenerateRcCommand::class),
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
