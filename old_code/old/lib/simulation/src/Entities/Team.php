<?php
namespace Phooty\Simulation\Entities;

class Team
{
    public const HOME = false;

    public const AWAY = true;

    /**
     * The Team's players
     *
     * @var Player[]
     */
    protected $players;

    /**
     * Is Away Team
     *
     * @var bool
     */
    protected $isAway;

    protected $name;

    protected $city;

    public function __construct(
        array $data,
        array $players,
        bool $isAway = false
    ) {
        // handle data
        $this->name = $data['name'] ?? null;

        $this->city = $data['city'] ?? null;

        $this->initPlayers($players);

        $this->isAway = $isAway;
    }

    private function initPlayers(array $players)
    {
        foreach ($players as $player) {
            $this->players[] = $this->initPlayer($player);
        }
    }

    private function initPlayer(Player $player)
    {
        $player->setTeam($this);
        return $player;
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
     * @return Player[]
     */
    public function getPlayers()
    {
        return $this->players;
    }
}
