<?php
namespace Phooty\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DrawSherrin extends Command
{
    protected const SHERRIN = <<<EOT
    <fg=red;bg=black;options=bold;>

         <fg=red;bg=red;options=bold;>OOOOO</>  
       <fg=red;bg=red;options=bold;>OOOOOOOOO</>
      <fg=red;bg=red;options=bold;>OOOO <fg=white;bg=red;options=bold>|</> OOOO</>
      <fg=red;bg=red;options=bold;>OOO <fg=white;bg=red;options=bold>=|=</> OOO</>
      <fg=red;bg=red;options=bold;>OOO <fg=white;bg=red;options=bold>=|=</> OOO</>
      <fg=red;bg=red;options=bold;>OOOO <fg=white;bg=red;options=bold>|</> OOOO</>
       <fg=red;bg=red;options=bold;>OOOOOOOOO</>
         <fg=red;bg=red;options=bold;>OOOOO</>  
    </>
EOT;

    protected function configure()
    {
        $this->setName('draw:sherrin')
            ->setDescription('Draw a sherrin')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(static::SHERRIN);
    }
}
