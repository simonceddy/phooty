<?php
namespace Phooty\Simulation\Entities;

use Ramsey\Uuid\Uuid;

abstract class SimulationEntity
{
    /**
     * The entity's UUID
     *
     * @var Uuid
     */
    protected $id;

    abstract protected function initialize(array $data);

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? Uuid::uuid1();

        $this->initialize($data);
    }

    /**
     * Get the entity's UUID
     *
     * @return  Uuid
     */ 
    public function getId()
    {
        return $this->id;
    }
}
