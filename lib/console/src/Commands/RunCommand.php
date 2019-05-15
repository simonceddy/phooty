<?php
namespace Phooty\Console\Commands;

use Symfony\Component\Console\Command\Command;
//use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Phooty\Core\Simulation;

class RunCommand extends Command
{
    public function __construct(Simulation $sim)
    {
        $this->sim = $sim;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('run')
            ->setDescription('Run Phooty')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //dd(new \ReflectionClass($this->getHelper('question')));
        dd($this->sim->run());
    }
}
