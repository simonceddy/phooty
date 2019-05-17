<?php
namespace Phooty\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Phooty\Console\Artwork\TitleLarry3D;
use Symfony\Component\Console\Input\InputOption;

//use Phooty\Console\Artwork\AsciiSherrin;

class GenerateRcCommand extends Command
{
    protected function configure()
    {
        $this->setName('generate:rc')
            ->setDescription(
                'Generate a phootyrc file in the user\'s home directory.'
            )
            ->setHelp(
                'Generate a phootyrc file in the user\'s home directory. The phootyrc file can be used to configure Phooty without editing the base config.'
            )
            ->addOption(
                '--filetype',
                'T',
                InputOption::VALUE_REQUIRED,
                'The filetype to save the phootyrc file as. Valid options are json, php, xml, yaml. The default is yaml.'
            )
            ->addOption(
                'force',
                'F',
                InputOption::VALUE_NONE,
                'Force overwriting an existing phootyrc file.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
    }
}
