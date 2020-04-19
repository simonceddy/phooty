<?php
namespace Phooty\Simulation\Support\Stats;

use Phooty\Simulation\Entities\PlayerEntity;

class Statline
{
    protected $stats = [
        'kicks' => 0,
        'handballs' => 0,
        'marks' => 0,
        'hitouts' => 0,
        'goals' => 0,
        'behinds' => 0,
        'tackles' => 0,
        'clearances' => 0,
        'clangers' => 0,
        'one_percenters' => 0,
        'bounces' => 0,
        'inside_50' => 0,
        'rebound_50' => 0,
    ];

    /**
     * The Player instance
     *
     * @var PlayerEntity
     */
    protected $player;

    public function __construct(PlayerEntity $player)
    {
        $this->player = $player;
    }

    /**
     * Get the Player instance
     *
     * @return  PlayerEntity
     */ 
    public function getPlayer()
    {
        return $this->player;
    }

    public function addStat(string $stat)
    {
        if (!array_key_exists($stat, $this->stats)) {
            throw new \Exception("{$stat} is not a valid stat!");
        }

        $this->stats[$stat]++;

        return $this;
    }

    public function getStat(string $stat)
    {
        if (!array_key_exists($stat, $this->stats)) {
            throw new \Exception("{$stat} is not a valid stat!");
        }
        return $this->stats[$stat];
    }

    public function getStats()
    {
        return $this->stats;
    }

    public function toArray()
    {
        return $this->getStats();
    }
}
