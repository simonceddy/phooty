<?php
namespace Phooty\Numbers;

use Phooty\Orm\Entities\Player;
use Phooty\Orm\Support\SeasonStatsToArray;

class StatManager
{
    public function getCareerStats(Player $player, bool $sum = true)
    {
        $stats = null;
        $rosters = $player->getRosters();

        foreach ($rosters as $roster) {
            if (null === $stats) {
                $stats = SeasonStatsToArray::convert($roster->getSeasonStats());
            } else {
                $stats = array_merge_recursive(
                    (array) $stats,
                    SeasonStatsToArray::convert($roster->getSeasonStats())
                );
            }
        }

        if ($sum) {
            foreach ($stats as &$stat) {
                $stat = array_sum($stat);
            }
        }
        
        return $stats;
    }
}
