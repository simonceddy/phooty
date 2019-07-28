<?php
namespace Phooty\Simulation\Support\Traits;

use Eddy\Tilemap\TileInterface;

trait IsPositionable
{
    /**
     * The current tile instance
     *
     * @var TileInterface
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
     * @param  TileInterface  $tile  The current tile instance
     *
     * @return  self
     */ 
    public function setTile(TileInterface $tile)
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

    /**
     * Does a tile instance exist?
     *
     * @return bool
     */
    public function hasTile()
    {
        return isset($this->tile);
    }
}
