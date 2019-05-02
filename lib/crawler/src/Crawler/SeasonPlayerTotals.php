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

class SeasonPlayerTotals extends BaseCrawler
{
    /**
     * The result data
     *
     * @var array
     */
    protected $result = [
        'players' => [],
        'teams' => []
    ];

    /**
     * Resolver for Team names/locations
     *
     * @var TeamResolver
     */
    private $teamResolver;

    private $current_team = false;

    public function __construct(Container $container, Mapping $mapping = null)
    {
        parent::__construct($container, $mapping ?? new PlayerSeasonTotals);
    }

    /**
     * @inheritDoc
     */
    public function crawl(string $html)
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
        return $this->result;
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
                    $model = $this->handlePlayer($player);
                    //$roster = $this->current_team->getRoster($this->season);
                    $this->result['players'][$model->id] = $model;
                    //dd($player);
                    /* $roster->addRosteredPlayer(
                        $this->factory('rostered-player')->build($player)
                    ); */
                    //dd($roster);
                    //$this->factory('rostered-player');
                }
            } elseif(RegexUtils::isTableHeading($node->textContent)) {
                $team = $this->teamFromTableHeading($node);
                if (!isset($this->result['teams'][($team['short'])])) {
                    $this->buildTeam($team);
                }
            }
        }
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
        if (isset($player['player'])) {
            $name = explode(',', $player['player'], 2);
            $player['surname'] = $name[0];
            !isset($name[1]) ?: $player['given_names'] = $name[1];
        }
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
        $this->result['teams'][$team->short] = $team;
        $this->current_team = $team;
        return $team;
    }
}
