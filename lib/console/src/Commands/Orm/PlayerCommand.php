<?php
namespace Phooty\Console\Commands\Orm;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Contracts\Container\Container;
use Doctrine\ORM\EntityManager;
use Phooty\Orm\Entities\Player;

class PlayerCommand extends Command
{
    private $app;

    /**
     * Entity Manager instance
     *
     * @var EntityManager
     */
    private $em;

    public function __construct(Container $app)
    {
        $this->app = $app;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('orm:player')
            ->setDescription(
                'Search persistance for players by name.'
            )
            ->addArgument(
                'name',
                InputArgument::IS_ARRAY,
                'Player names to search for.'
            )
            ->addOption(
                'prior',
                'p',
                InputOption::VALUE_REQUIRED,
                'Previous players with the same name.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->app->make(EntityManager::class);
        $names = $input->getArgument('name');

        switch ($names) {
            case 0 === count($names):
                $output->writeln('No names provided.');
                break;
            case 1 === count($names):
                dd($this->locateSurname($names[0]));
                break;
            case 2 === count($names):
                dd($this->locateFullName($names[1], $names[0]));
                break;
        }
    }

    protected function locateSurname(string $surname)
    {
        $player = $this->em->getRepository(Player::class);
        return $player->findBy(['surname' => $surname]);
    }

    protected function locateFullName(string $surname, string $given_names, int $prior = null)
    {
        $player = $this->em->getRepository(Player::class);
        $criteria = [
            'surname' => $surname,
            'given_names' => $given_names
        ];
        //dd($player);
        null === $prior ?: $criteria['prior_players'] = $prior;
        $result = $player->findBy($criteria);
        return empty($result) ? 'No results found' : $result;
    }
}
