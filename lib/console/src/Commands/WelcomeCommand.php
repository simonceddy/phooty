<?php
namespace Phooty\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Phooty\Console\Artwork\TitleLarry3D;
//use Phooty\Console\Artwork\AsciiSherrin;

class WelcomeCommand extends Command
{
    protected function configure()
    {
        $this->setName('welcome')
            ->setDescription('Display welcome message.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // $output->writeln(AsciiSherrin::render());
        $output->writeln(TitleLarry3D::render());
        // $output->writeln(AsciiSherrin::render());
    }
}
