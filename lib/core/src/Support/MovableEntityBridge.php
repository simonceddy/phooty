<?php
namespace Phooty\Core\Support;

use Phooty\Contract\Core\Movable;
use Phooty\Contract\Core\Tilemap\Tile;

class MovableEntityBridge implements Movable
{
    /**
     * The Entity instance
     *
     * @var object
     */
    protected $entity;

    /**
     * The Tile containing the entity
     *
     * @var Tile
     */
    protected $tile;

    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * Get the Entity instance
     *
     * @return  object
     */ 
    public function getEntity()
    {
        return $this->entity;
    }

    public function __call(string $name, array $arguments)
    {
        if ((0 === strpos($name, 'get')
            || 0 === strpos($name, 'set'))
            && method_exists($this->entity, $name)
        ) {
            return call_user_func_array([$this->entity, $name], $arguments);
        }

        throw new \Exception(
            "Call to undefined method: {$name}"
        );
    }

    /**
     * Get the Tile containing the entity
     *
     * @return  Tile
     */ 
    public function getTile()
    {
        return $this->tile;
    }

    /**
     * Set the Tile containing the entity
     *
     * @param  Tile  $tile  The Tile containing the entity
     *
     * @return  self
     */ 
    public function setTile(Tile $tile)
    {
        $this->tile = $tile;

        return $this;
    }
}
