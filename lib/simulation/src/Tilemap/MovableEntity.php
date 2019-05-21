<?php
namespace Phooty\Simulation\Tilemap;

use Phooty\Simulation\Entities\SimulationEntity;
use Phooty\Simulation\Support\Traits\IsPositionable;

class MovableEntity
{
    use IsPositionable;

    /**
     * The wrapped entity
     *
     * @var SimulationEntity
     */
    protected $entity;

    public function __construct(SimulationEntity $entity)
    {
        $this->entity = $entity;
    }
}
