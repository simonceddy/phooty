<?php
namespace Phooty\Simulation\Support\Traits;

use Phooty\Simulation\Tilemap\Tile;

trait IsPositionable
{
    /**
     * The current tile instance
     *
     * @var Tile
     */
    protected $tile;

    /**
     * Get the current tile instance
     *
     * @return  Tile
     */ 
    public function getTile()
    {
        return $this->tile;
    }

    /**
     * Set the current tile instance
     *
     * @param  Tile  $tile  The current tile instance
     *
     * @return  self
     */ 
    public function setTile(Tile $tile)
    {
        $this->tile = $tile;

        return $this;
    }

    /**
     * Clear the current tile instance
     *
     * @return self
     */
    public function clearTile()
    {
        $this->tile = null;
        return $this;
    }
}
