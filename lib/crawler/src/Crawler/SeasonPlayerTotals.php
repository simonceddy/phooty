<?php
namespace Phooty\Crawler\Crawler;

use Symfony\Component\DomCrawler\Crawler;
use Phooty\Crawler\Mappings\PlayerSeasonTotals;
use Phooty\Crawler\Support\CrawlerUtils;
use Phooty\Crawler\Support\RegexUtils;
use Illuminate\Contracts\Container\Container;
use Phooty\Crawler\Support\TeamResolver;
use Phooty\Crawler\Mappings\Mapping;
use Phooty\Crawler\Support\MappingUtils;
use Phooty\Crawler\Results;
use Phooty\Orm\Entities\Team;

class SeasonPlayerTotals extends BaseCrawler
{
    /**
     * Resolver for Team names/locations
     *
     * @var TeamResolver
     */
    private $teamResolver;

    private $current_team = false;

    private $season;

    private $pending = [];

    public function __construct(Container $container, Mapping $mapping = null)
    {
        parent::__construct($container, $mapping ?? new PlayerSeasonTotals);
    }

    /**
     * @inheritDoc
     */
    public function crawl(string $html): Results
    {
        $crawler = new Crawler($html);
        if (!isset($this->season)) {
            $this->season = CrawlerUtils::getSeasonFromTitle($crawler);
        }
        $filter = $crawler->filter('table');
        
        foreach ($filter as $el) {
            if ($el->childNodes->count() > 2) {
                $this->crawlNodes($el->childNodes); 
            }
        }
        
        return $this->result();
    }

    /**
     * Crawls through nodes and attempts to pass data to the appropiate
     * handlers.
     * 
     * Nodes are expected to be table rows.
     *
     * @param \DomNodeList $nodes
     * @return void
     */
    protected function crawlNodes(\DOMNodeList $nodes)
    {
        foreach ($nodes as $node) {
            if (($children = $node->childNodes)->count() > 2
                && false !== $this->current_team
            ) {
                foreach ($children as $child) {
                    $player = MappingUtils::mapNode($child, $this->mappings);
                    $player['prior'] = $this->checkForPriorNames($child);
                    $model = $this->handlePlayer($player);
                    //$model->stats = $this->factory('stats')->build($player);
                    //$roster = $this->current_team->getRoster($this->season);
                    $this->result()->players()->add($model);
                    //$this->result['players'][$model->id] = $model;
                    //dd($player);
                    /* $roster->addRosteredPlayer(
                        $this->factory('rostered-player')->build($player)
                    ); */
                    //dd($roster);
                    //$this->factory('rostered-player');
                }
            } elseif(RegexUtils::isTableHeading($node->textContent)) {
                $team = $this->teamFromTableHeading($node);
                $this->buildTeam($team);
            }
        }
    }

    private function checkForPriorNames(\DOMNode $node)
    {
        $a = $node->childNodes[1]->childNodes[0]->attributes[0];
        if (!preg_match('/(\d+\.html)$/', $a->value)) {
            return 0;
        }
        return (int) preg_replace('/\D/', '', $a->value);
        
    }

    /**
     * Attempts to resolve a Team from a table row.
     *
     * @param \DOMNode $node
     * @return array
     */
    private function teamFromTableHeading(\DOMNode $node)
    {
        $team = RegexUtils::getTeamFromHeading(
            $node->textContent
        );
        if (!isset($this->teamResolver)) {
            $this->teamResolver = $this->container->make(TeamResolver::class);
        }
        $teamData = $this->teamResolver->resolve($team);
        if (!$teamData) {
            throw new \LogicException('Invalid team: '.$team);
        }
        return $teamData;
        
    }

    /**
     * Handles resolving or creating a player from given data
     *
     * @todo Resolving players
     * 
     * @param array $player
     * @return array
     */
    protected function handlePlayer(array $player)
    {
        // todo: make better
        return $this->factory('player')->build($player);
    }

    protected function buildTeam(array $teamData)
    {
        $team = $this->factory('team')->build($teamData);
        //dd($team);
        /* $this->factory('roster')->build([
            'team' => $team,
            'season' => $this->getSeason()
        ]); */
        $this->result()->teams()->add($team);
        $this->pending[$team->getShort()] = $this->pendingNewRoster($team);
        $this->result()->rosters()[$team->getShort()] = [];
        $this->current_team = $team;
        return $team;
    }

    protected function pendingNewRoster(Team $team)
    {
        $initRoster = \Closure::fromCallable(
            function (array $players) use ($team) {
                return $this->factory('roster')->build([
                    'players' => $players,
                    'team' => $team,
                    'season' => $this->season
                ]);
            }
        );

        return $initRoster;
    }
}
