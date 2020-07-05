<?php
namespace Phooty\Entities;

class TeamPlayer
{
    protected Team $team;

    protected Player $player;

    protected int $number;

    public function __construct(int $number, Team $team, Player $player)
    {
        $this->number = $number;
        $this->team = $team;
        $this->player = $player;
    }

    public function player()
    {
        return $this->player;
    }

    public function team()
    {
        return $this->team;
    }
}
