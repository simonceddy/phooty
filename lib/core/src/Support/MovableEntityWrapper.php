<?php
namespace Phooty\Core\Support;

use Phooty\Contract\Core\Movable;
use Phooty\Contract\Core\Tilemap\Tile;

class MovableEntityWrapper implements Movable
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

    /**
     * Magic __call method.
     * 
     * Passes methods on to entity instance if they exist on the entity, or if
     * the entity has it's own __call method.
     *
     * @param string $name
     * @param array $params
     * @return mixed
     * 
     * @throws \Exception thrown if no method is found
     */
    public function __call(string $name, array $params)
    {
        if (method_exists($this->entity, $name)) {
            return call_user_func_array([$this->entity, $name], $params);
        } elseif (method_exists($this->entity, '__call')) {
            return call_user_func([$this->entity, '__call'], $name, $params);
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
