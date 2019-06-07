<?php
namespace Phooty\Simulation\Tilemap;

use Eddy\Tilemap\TileInterface;
use Eddy\Tilemap\Tile;
use Phooty\Simulation\Entities\SimulationEntity;

class TileDecorator implements TileInterface
{
    /**
     * The Entities present in the Tile
     *
     * @var array
     */
    protected $entities = [];

    /**
     * The tile instance
     *
     * @var Tile
     */
    protected $tile;

    public function __construct(Tile $tile)
    {
        $this->tile = $tile;
    }

    /**
     * Get the Entities present in the Tile
     *
     * @return  array
     */ 
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * Add an entity to the Tile
     *
     * @param SimulationEntity $entity
     * @return self
     * 
     * @throws \LogicException  thrown if an existing Entity is given
     */
    public function addEntity(SimulationEntity $entity)
    {
        $id = $entity->getId();

        if (isset($this->entities[$id])) {
            throw new \LogicException(
                "An entity with that UUID already exists in this tile."
            );
        }

        $this->entities[$id] = $entity;
        return $this;
    }

    public function clearEntity(SimulationEntity $entity)
    {
        $id = $entity->getId();

        if (!isset($this->entities[$id])) {
            throw new \LogicException(
                "Entity does not exist in this tile."
            );
        }

        unset($this->entities[$id]);

        // check if empty

        return $this;
    }

    public function clearEntities()
    {
        $this->entities = [];

        // emit empty

        return $this;
    }

    public function getCoords(): array
    {
        return $this->tile->getCoords();
    }
}
