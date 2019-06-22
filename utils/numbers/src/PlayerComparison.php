<?php
namespace Phooty\Numbers;

use Phooty\Orm\Entities\Player;
use Phooty\Orm\Support\SeasonStatsToArray;

class PlayerComparison
{
    /**
     * StatManager instance
     *
     * @var StatManager
     */
    protected $statManager;

    /**
     * Get the StatManager instance
     *
     * @return StatManager
     */
    public function statManager()
    {
        if (!isset($this->statManager)) {
            $this->statManager = new StatManager();
        }

        return $this->statManager;
    }

    public function compare(Player $playerA, Player $playerB)
    {
        $aStats = $this->statManager()->getCareerStats($playerA);
        $bStats = $this->statManager()->getCareerStats($playerB);

        dd($aStats, $bStats);
    }
}
