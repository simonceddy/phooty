<?php
namespace Phooty\Numbers;

use Phooty\Orm\Support\SeasonStatsToArray;
use Phooty\Orm\Entities\Player;

class StatCalc
{
    public static function careerStats(Player $player, bool $sum = true)
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

    public static function careerAverages(Player $player)
    {
        $stats = self::careerStats($player);

        $games = $stats['games'];

        foreach ($stats as $stat => &$val) {
            if ('games' !== $stat) {
                $val = $val / $games;
            }
        }

        return $stats;
    }
}
