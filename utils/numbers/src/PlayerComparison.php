<?php
namespace Phooty\Numbers;

use Phooty\Orm\Entities\Player;

class PlayerComparison
{
    public function compare(Player $playerA, Player $playerB)
    {
        $aStats = StatCalc::careerStats($playerA);
        $bStats = StatCalc::careerStats($playerB);

        return [$aStats, $bStats];
    }
}
