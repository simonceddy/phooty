<?php
namespace Phooty\Simulation\Entities;

use Phooty\Simulation\Entities\PlayerEntity;

class Team
{
    public const HOME = false;

    public const AWAY = true;

    /**
     * The Team's players
     *
     * @var PlayerEntity[]
     */
    protected $players;

    /**
     * Is Away Team
     *
     * @var bool
     */
    protected $isAway;

    public function __construct(
        array $data,
        array $players,
        bool $isAway = false
    ) {
        // handle data

        $this->initPlayers($players);

        $this->isAway = $isAway;
    }

    private function initPlayers(array $players)
    {
        $this->players = array_filter($players, function ($player) {
            return $player instanceof PlayerEntity;
        });
    }

    public function isHomeTeam(): bool
    {
        return !$this->isAway;
    }

    public function isAwayTeam(): bool
    {
        return $this->isAway;
    }

    /**
     * Get the team's players
     *
     * @return PlayerEntity[]
     */
    public function getPlayers()
    {
        return $this->players;
    }
}
