<?php
namespace Phooty\Numbers;

use Phooty\Orm\Support\OrmUtil;
use Phooty\Orm\Support\SeasonStatsToArray;
use Phooty\Numbers\Traits\Calculates;
use Phooty\Orm\Entities\Player;

class MeasuringStick
{
    use Calculates;

    protected $maxCounts;

    protected $minCounts;

    protected $ormUtil;

    public function __construct(OrmUtil $ormUtil)
    {
        $this->ormUtil = $ormUtil;
        $this->maxCounts = new StatArray();
        $this->minCounts = new StatArray();
        unset($this->maxCounts['games'], $this->minCounts['games']);
    }

    public function getPercentiles(Player $player)
    {
        
    }

    public function getMinMaxes(int $season)
    {
        $repo = $this->ormUtil->repo('RosterPlayer');

        $results = $repo->findBy([
            'season' => $season
        ]);

        if (null === $results) {
            return;
        }

        foreach ($results as $player) {
            $stats = SeasonStatsToArray::convert($player->getSeasonStats());
            $this->scanStats($stats);
        }

        return [
            'season' => $season,
            'max' => $this->maxCounts,
            'min' => $this->minCounts,
        ];
    }

    protected function scanStats(array $stats)
    {
        $games = $stats['games'];

        if ($games < 3) {
            return;
        }

        unset($stats['games']);

        foreach ($stats as $stat => $val) {
            $val = round($val / $games, 3);
            if ($val > $this->maxCounts[$stat]) {
                $this->maxCounts[$stat] = $val;
            }
            if ((0 === $this->minCounts[$stat] && $val > 0)
                || $val < $this->minCounts[$stat]
            ) {
                $this->minCounts[$stat] = $val;
            }
        }
    }
}
