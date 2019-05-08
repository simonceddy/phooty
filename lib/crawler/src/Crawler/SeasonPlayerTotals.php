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
use Doctrine\ORM\EntityManager;
use Phooty\Orm\Entities\Player;
use Phooty\Crawler\Support\OrmUtil;

/**
 * Crawls the HTML from a Season totals page from afltables.com
 * 
 * @todo Split methods/tidy up - too much here
 */
class SeasonPlayerTotals extends BaseCrawler
{
    /**
     * Resolver for Team names/locations
     *
     * @var TeamResolver
     */
    private $teamResolver;

    private $team = false;

    private $season;

    private $rosters = [];

    private $orm;

    public function __construct(Container $container, Mapping $mapping = null)
    {
        parent::__construct($container, $mapping ?? new PlayerSeasonTotals);
        $this->orm = $this->container->make(OrmUtil::class);
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
        $this->initPendingRosters();
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
                && false !== $this->team
            ) {
                foreach ($children as $child) {
                    $data = MappingUtils::mapNode($child, $this->mappings);
                    if (!isset($data['player'])) {
                        break;
                    }
                    $player = [];
                    $name = explode(',', $data['player'], 2);
                    $player['surname'] = $name[0];
                    !isset($name[1]) ?: $player['given_names'] = $name[1];
                    $player['prior_players'] = $this->checkForPriorNames($child);
                    $model = $this->resolvePlayer($player);
                    //$model->stats = $this->factory('stats')->build($player);
                    //$roster = $this->team->getRoster($this->season);
                    $this->result()->players()->add($model);
                    $this->addToCurrentRoster($model);
                    //$this->result['players'][$model->id] = $model;
                    //dd($player);
                    /* $roster->addRosteredPlayer(
                        $this->factory('rostered-player')->build($player)
                    ); */
                    //dd($roster);
                    //$this->factory('rostered-player');
                }
            } elseif(RegexUtils::isTableHeading($node->textContent)) {
                $team = $this->resolveTeam($this->teamFromTableHeading($node));
                $this->team = $team;
                $this->result()->teams()->add($team);
            }
        }
    }

    private function resolveTeam(array $team)
    {
        return $this->orm->find(Team::class, $team, function (array $team) {
            return $this->factory('team')->build($team);;
        });
    }

    private function resolvePlayer(array $player)
    {
        return $this->orm->find(Player::class, $player, function (array $player) {
            return $this->factory('player')->build($player);;
        });
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

    protected function resolveRoster(Team $team)
    {

        $this->rosters[$team->getShort()] = [
            'pending' => $this->pendingNewRoster($team),
            'players' => []
        ];
    }

    protected function initPendingRosters()
    {
        foreach ($this->rosters as $roster) {
            if (isset($roster['pending'], $roster['players'])
                && is_callable($roster['pending'])
            ) {
                $this->result()->rosters()->add(
                    call_user_func($roster['pending'], $roster['players'])
                );
            }
        }
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

    protected function addToCurrentRoster(Player $player)
    {
        $this->rosters[$this->team->getShort()]['players'][] = $this->factory(
            'roster.player'
        )->build([
            'player' => $player
        ]);
    }

    protected function orm()
    {
        return $this->orm;
    }
}
