<?php
namespace Phooty\Core\Support\Traits;

use Phooty\Core\Tilemap\Tile;

trait HasTilemapPosition
{
    /**
     * The current Tile instance.
     *
     * @var Tile
     */
    protected $tile;

    /**
     * Get the current Tile instance.
     *
     * @return  Tile
     */ 
    public function getTile()
    {
        return $this->tile;
    }

    /**
     * Set the current Tile instance.
     *
     * @param  Tile  $tile  The current Tile instance.
     *
     * @return  self
     */ 
    public function setTile(Tile $tile)
    {
        $this->tile = $tile;

        return $this;
    }

    public function clearTile()
    {
        $this->tile = null;
        return $this;
    }
}
