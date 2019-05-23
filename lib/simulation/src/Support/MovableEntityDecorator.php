<?php
namespace Phooty\Simulation\Support;

use Phooty\Simulation\Entities\SimulationEntity;
use Phooty\Simulation\Support\Traits\IsPositionable;
use Phooty\Simulation\Contract\MovableEntity;

class MovableEntityDecorator implements MovableEntity
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

    /**
     * Allows calling entity methods from the decorator
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     * 
     * @throws \Exception thrown if no matching method is found on the entity
     */
    public function __call(string $name, array $arguments)
    {
        if (method_exists($this->entity, $name)) {
            return call_user_func_array([$this->entity, $name], $arguments);
        }

        throw new \Exception("Undefined method: {$name}");
    }
}
