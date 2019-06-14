<?php
namespace Phooty\Contract\Core\Tilemap;

use Phooty\Contract\Core\Movable;

interface Tile
{
    public function addMovableEntity(Movable $entity, int $pos = null);
}
