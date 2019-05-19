<?php
namespace Phooty\Core\Support\Traits;

use Phooty\Contract\Core\Movable;

trait HoldsMovableEntities
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $entities = [];

    public function addMovableEntity(Movable $entity, int $pos = null)
    {
        if (null === $pos) {
            $this->entities[] = $entity;
            return $this;
        }

        $ents = array_slice($this->entities, $pos);
        $this->entities = array_merge($this->entities, [$entity], $ents);
        return $this;
    }

    public function hasEntity(Movable $entity)
    {
        if (in_array($entity, $this->entities)) {
            return true;
        }

        /* $check = array_filter($this->entities, function ($ent) use ($entity) {

        }); */

        return false;
    }
}
