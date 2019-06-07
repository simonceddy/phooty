<?php
namespace Phooty\Simulation\Support;

use Phooty\Simulation\Match\MatchContainer;
use Phooty\Simulation\Entities\Team;
use Phooty\Simulation\Tilemap\Tilemap;
use Phooty\Simulation\Entities\SherrinEntity;
use Phooty\Simulation\Entities\PlayerEntity;

class MapPlacer
{
    /**
     * The MatchContainer instance
     *
     * @var MatchContainer
     */
    protected $match;

    private $has_run = false;

    /**
     * Array of positions coords
     *
     * @var array[]
     */
    private $positions = [];

    /**
     * The coords for the center of the map
     *
     * @var int[]
     */
    private $c;

    public function __construct(MatchContainer $match)
    {
        $this->match = $match;
    }

    public function run(SherrinEntity $ball = null)
    {
        if ($this->has_run) {
            throw new \LogicException(
                "Attempting to run MapPlacer more than once."
            );
        }

        $map = $this->match->getTilemap();

        // place home team players
        $this->placeTeam($map, $this->match->getHomeTeam());

        // place Away team players
        $this->placeTeam($map, $this->match->getAwayTeam());
    }

    protected function placeTeam(Tilemap $map, Team $team)
    {
        !empty($this->positions) ?: $this->initPositions($map);
        $players = $team->getPlayers();
        
        $i = 0;

        foreach ($this->positions as $x => $line) {
            foreach ($line as $y) {
                //dd($this->positions);
                $map->tile($x, $y)->addEntity($players[$i]);
                $i++;
                //dd($map);
            }
        }

        /* HtmlDumper::dump($map);
        dd(); */
    }

    protected function placePlayer(Tilemap $map, PlayerEntity $player)
    {

    }

    protected function initPositions(Tilemap $map)
    {
        $w = $map->width();
        $l = $map->length();
        //dd($w, $l);
        $this->c = [round($w / 2), round($l / 2)];
        
        $per_line = round($w / 6);

        $spread = round($l / 4);

        for ($a = $per_line; $a < $w; $a += $per_line) {
            $this->positions[$c = ((int) $a)] = [];

            for ($b = $spread; $b < $l; $b += $spread) {
                $this->positions[$c][] = (int) $b;
            }
        }
    }
}
