<?php
namespace Phooty\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Phooty\Foundation\Installer\PreInstaller;
use Phooty\Foundation\Application;
use Symfony\Component\Console\Input\InputOption;
use Phooty\Console\Artwork\TitleLarry3D;

class InstallCommand extends Command
{
    private $app;

    public function __construct(Application $app)
    {
        parent::__construct();
        $this->app = $app;
    }

    protected function configure()
    {
        $this->setName('install')
            ->setDescription('Install the Phooty database and config.')
            ->addOption(
                'force',
                'F',
                InputOption::VALUE_NONE,
                'Force reinstall if Phooty is already installed.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(TitleLarry3D::render());

        $force = $input->getOption('force');
        if ($this->app->isInstalled()) {
            if (!$force) {
                $output->writeln(
                    "<error>Phooty is already installed! Use the --force (-F) option to force a reinstall.</>"
                );
                return;
            }
            // run reinstall
        }
        $preinstaller = $this->app->make(PreInstaller::class);
        $output->writeln('<info>Preparing directories for installation...</>');
        $installer = $preinstaller->prepare();

        $output->writeln('<info>Installing...</>');
        dd($installer);
    }
}
