<?php
namespace Phooty\Simulation\Entities;

class Team
{
    public const HOME = false;

    public const AWAY = true;

    /**
     * Is Away Team
     *
     * @var bool
     */
    protected $isAway;

    public function __construct(array $data, bool $isAway = false)
    {
        $this->isAway = $isAway;
    }

    public function isHomeTeam(): bool
    {
        return !$this->isAway;
    }

    public function isAwayTeam(): bool
    {
        return $this->isAway;
    }

    public function getPlayers()
    {
        
    }
}
