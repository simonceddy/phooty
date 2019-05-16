<?php
namespace Phooty\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends Command
{
    protected function configure()
    {
        $this->setName('install')
            ->setDescription('Install the Phooty database and config.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
    }
}
