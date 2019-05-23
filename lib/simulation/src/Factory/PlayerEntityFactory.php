<?php
namespace Phooty\Simulation\Factory;

use Phooty\Simulation\Entities\PlayerEntity;

class PlayerEntityFactory
{
    public function create(array $data = [])
    {
        return new PlayerEntity();
    }
}
