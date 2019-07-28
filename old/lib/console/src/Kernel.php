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
        $commands = $this->config->get('console.commands');
        //dd($this->config);
        foreach ($commands as $command) {
            try {
                $this->add($this->app->make($command));
            } catch (\Exception $e) {
                dump($command);
                throw $e;
            }
        }
    }
}
