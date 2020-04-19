<?php
namespace Phooty\Contracts\Simulator;

interface Builder
{
    public function setHomeTeam(Team $homeTeam);

    public function setAwayTeam(Team $awayTeam);

    public function setGround(Ground $ground);

    public function build();
}
