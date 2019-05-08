<?php
namespace Phooty\Crawler\Factory;

use Phooty\Orm\Entities\Player;
use Phooty\Orm\Entities\RosterPlayer;

class RosterPlayerFactory extends BaseFactory
{
    public function build(array $data = [])
    {
        if (!isset($data['player'])) {
            throw new \LogicException("No Player is set");
        }
        $rosterPlayer = new RosterPlayer();
        $rosterPlayer->setPlayer($data['player']);
        return $rosterPlayer;
    }
}
