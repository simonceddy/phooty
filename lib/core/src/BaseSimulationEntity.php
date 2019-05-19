<?php
namespace Phooty\Core;

use Phooty\Core\Support\Traits\HasTilemapPosition;
use Phooty\Contract\Arrayable;

abstract class BaseSimulationEntity implements SimulationEntity, Arrayable
{
    use HasTilemapPosition;

    public function toArray(): array
    {
        return [];
    }
}
