<?php
namespace Phooty\Numbers;

use Phooty\Orm\Entities\Player;
use Phooty\Numbers\Traits\Calculates;

class PlayerComparison
{
    use Calculates;

    public function compareCareer(Player $playerA, Player $playerB)
    {
        $aStats = $this->statCalc()->careerTotals($playerA);
        $bStats = $this->statCalc()->careerTotals($playerB);

        return [$aStats, $bStats];
    }

    public function compareSeason(Player $playerA, Player $playerB, int $season)
    {
        $aStats = $this->statCalc()->seasonTotals($playerA, $season);
        $bStats = $this->statCalc()->seasonTotals($playerB, $season);

        return [$aStats, $bStats];
    }

    public function compareCareerAvg(Player $playerA, Player $playerB)
    {
        $aStats = $this->statCalc()->careerAverages($playerA);
        $bStats = $this->statCalc()->careerAverages($playerB);

        return [$aStats, $bStats];
    }

    public function compareSeasonAvg(Player $playerA, Player $playerB, int $season)
    {
        $aStats = $this->statCalc()->seasonAverages($playerA, $season);
        $bStats = $this->statCalc()->seasonAverages($playerB, $season);

        return [$aStats, $bStats];
    }
}
