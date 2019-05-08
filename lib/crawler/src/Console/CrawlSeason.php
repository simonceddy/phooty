<?php
namespace Phooty\Crawler\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Phooty\Crawler\Client;
use Phooty\Crawler\Crawler\SeasonPlayerTotals;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Contracts\Container\Container;
use Doctrine\ORM\EntityManager;
use Phooty\Orm\Entities\Player;
use Phooty\Orm\Entities\Team;

class CrawlSeason extends Command
{
    /**
     * The container instance
     *
     * @var Container
     */
    private $container;

    /**
     * The EntityManager instance
     *
     * @var EntityManager
     */
    private $em;

    private $players_persisted = 0;

    private $teams_persisted = 0;
    
    public function __construct(Container $container)
    {
        $this->container = $container;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('crawl:season')
            ->setDescription(
                'Crawl html data for a single season.'
            )
            ->addArgument(
                'season',
                InputArgument::REQUIRED,
                'The season year'
            )
            ->addOption(
                'fromFile',
                'F',
                InputOption::VALUE_REQUIRED,
                'Crawl a locally stored HTML file.'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $season = $input->getArgument('season');
        // todo: validate season
        
        if (!$path = $input->getOption('fromFile')) {
            $client = new Client;
            // todo: check connection
            
            $output->writeln('Sending request...');
            $response = $client->getSeason((int) $season);
            
            $output->writeln('Received response.');
            
            // check $response status
    
            $html = $response->getBody()->getContents();
        } else {
            if (!file_exists($fn = getcwd().'/'.$path)
                && !file_exists($fn = $fn.'.html')
            ) {
                $output->writeln('<error>Could not locate '.$path.'</error>');
                return;
            }
            $output->writeln('Located file...');
            $output->writeln('Reading content...');
            $html = file_get_contents($fn);
        }

        
        $crawler = $this->container->make(SeasonPlayerTotals::class);
        $output->writeln('Crawling html...');
        $result = $crawler->crawl($html);
        $players = $result->players()->all();
        $this->em = $this->container->make(EntityManager::class);
        foreach ($players as &$player) {
            $player = $this->persistPlayerIfNew($player);
        }
        $teams = $result->teams()->all();
        foreach ($teams as &$team) {
            $team = $this->persistTeamIfNew($team);
        }
        /* 
        foreach ($result->rosters()->all() as &$roster) {
            $roster = $this->em->persist($roster);
        } */
        $this->em->flush();
        $output->writeln("Stored {$this->players_persisted} new players.");
        $output->writeln("Stored {$this->teams_persisted} new teams.");
        dd(array_random($teams));
    }

    private function persistPlayerIfNew(Player $player)
    {
        
        $repo = $this->em->getRepository(Player::class);
        $criteria = [
            'surname' => $player->getSurname(),
            'given_names' => $player->getGivenNames(),
            'prior_players' => $player->getPriorPlayers()
        ];
        //dd($player);
        $result = $repo->findBy($criteria);
        if (empty($result)) {
            $this->em->persist($player);
            $this->players_persisted++;
            return $player;
        }
        return $result[0];
    }

    private function persistTeamIfNew(Team $team)
    {
        
        $repo = $this->em->getRepository(Team::class);
        $criteria = [
            'city' => $team->getCity(),
            'short' => $team->getShort(),
            'name' => $team->getName()
        ];
        $result = $repo->findBy($criteria);
        if (empty($result)) {
            $this->em->persist($team);
            $this->teams_persisted++;
            return $team;
        }
        return $result[0];
    }
}
