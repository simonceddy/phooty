<?php
namespace Phooty\Simulation\Support\Stats;

use Phooty\Simulation\Entities\PlayerEntity;

class StatlineContainer
{
    protected $statlines = [];

    public function addStatline(Statline $statline)
    {
        $this->statlines[$statline->getPlayer()->getId()] = $statline;
        return $this;
    }

    public function getStatline(PlayerEntity $player)
    {
        $id = $player->getId();

        return $this->statlines[$id] ?? false;
    }

    public function getStatlines()
    {
        return $this->statlines;
    }

    public function toArray()
    {
        $data = [];

        foreach ($this->statlines as $player => $statline) {
            $data[$player] = $statline->toArray();
        }
        
        return $data;
    }
}