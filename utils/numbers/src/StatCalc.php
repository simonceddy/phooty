<?php
namespace Phooty\Numbers;

use Phooty\Orm\Support\SeasonStatsToArray;
use Phooty\Orm\Entities\Player;
use Phooty\Orm\Entities\RosterPlayer;

class StatCalc
{
    /**
     * Returns the career stats of the given Player.
     * 
     * Sums stats by default. If $sum is false stats will not be summed and will
     * be returned as an array of season totals.
     *
     * @param Player $player
     * @param boolean $sum
     * @return array
     */
    public function careerTotals(Player $player, bool $sum = true)
    {
        $stats = null;
        $rosters = $player->getRosters();

        foreach ($rosters as $roster) {
            if (null === $stats) {
                $stats = $this->statsToArray($roster);
            } else {
                $stats = array_merge_recursive(
                    (array) $stats,
                    $this->statsToArray($roster)
                );
            }
        }

        if ($sum) {
            $stats = $this->sumStats($stats);
        }
        
        return $stats;
    }

    /**
     * Iterates over $stats array and sums each child array.
     * 
     * Returns the resultant array.
     *
     * @param array[] $stats
     * @return array
     */
    public function sumStats(array $stats)
    {
        foreach ($stats as &$stat) {
            $stat = array_sum($stat);
        }
        
        return $stats;
    }

    /**
     * Get the Career Averages for the given Player.
     * 
     * Returns an array of $stat => $average
     *
     * @param Player $player
     * @param integer $precision  The float precision (default 3)
     * @return array
     */
    public function careerAverages(Player $player, int $precision = 3)
    {
        $stats = $this->careerTotals($player);

        $games = $stats['games'];

        foreach ($stats as $stat => &$val) {
            if ('games' !== $stat) {
                $val = round($val / $games, $precision);
            }
        }

        return $stats;
    }

    /**
     * Returns the given Player's total Stats for the given season.
     *
     * @param Player $player
     * @param integer $season
     * @return array
     * 
     * @todo Remove filter and use custom query?
     */
    public function seasonTotals(Player $player, int $season)
    {
        $roster = $player->getRosters()->filter(
            function ($roster) use ($season) {
                return $season === $roster->getSeason();
            }
        )->first();

        $stats = $this->statsToArray($roster);
        
        return $stats;
    }

    /**
     * Returns the given Player's average Stats for the given season.
     *
     * @param Player $player
     * @param integer $season
     * @param integer $precision  The float precision (default 3)
     * @return void
     */
    public function seasonAverages(
        Player $player,
        int $season,
        int $precision = 3
    ) {
        $stats = $this->seasonTotals($player, $season);

        $games = $stats['games'];

        foreach ($stats as $stat => &$val) {
            if ('games' !== $stat) {
                $val = round($val / $games, $precision);
            }
        }

        return $stats;
    }

    public static function __callStatic(string $name, $arguments)
    {
        $calc = new self();

        // todo: fix
        try {
            $res = call_user_func_array([$calc, $name], $arguments);
        } catch (\Exception $e) {
            throw $e;
        }

        return $res;
    }

    /**
     * Wrapper method around SeasonStatsToArray helper
     *
     * @param RosterPlayer $rosterPlayer
     * @return array
     */
    public function statsToArray(RosterPlayer $rosterPlayer)
    {
        return new StatArray(
            SeasonStatsToArray::convert($rosterPlayer->getSeasonStats())
        );
    }
}
