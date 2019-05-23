<?php
namespace Phooty\Simulation\Contract;

use Phooty\Simulation\Tilemap\Tile;

interface MovableEntity
{
    public function getTile();

    public function hasTile();

    public function setTile(Tile $tile);

    public function clearTile();
}
