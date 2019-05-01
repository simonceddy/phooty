<?php
namespace Phooty\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FizzBuzzCommand extends Command
{
    protected function configure()
    {
        $this->setName('fizzbuzz')
            ->addOption(
                'min',
                'm',
                InputOption::VALUE_REQUIRED,
                'The starting number. Is 1 by default.'
            )
            ->addOption(
                'max',
                'M',
                InputOption::VALUE_REQUIRED,
                'The number to count to. Is 100 by default.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $min = $input->getOption('min') ?? 1;
        $max = $input->getOption('max') ?? 100;

        for ($i = $min; $i <= $max; $i++) {
            echo !is_float($a = $i / 3) ? 'fizz' : null;
            echo !is_float($b = $i / 5) ? 'buzz' : null;
            echo is_float($a) && is_float($b) ? $i : null;
            echo PHP_EOL;
        }
    }
}
