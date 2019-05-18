<?php
namespace Phooty\Contract\Core;

use Phooty\Contract\Core\Tilemap\Tile;

interface Movable
{
    public function setTile(Tile $tile);
}
