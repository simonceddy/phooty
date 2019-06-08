<?php
namespace Phooty\Simulation\Contract;

use Eddy\Tilemap\TileInterface;

interface MovableEntity
{
    public function getTile();

    public function hasTile();

    public function setTile(TileInterface $tile);

    public function clearTile();
}
