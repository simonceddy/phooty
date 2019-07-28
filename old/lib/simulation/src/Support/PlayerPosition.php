<?php
namespace Phooty\Simulation\Support;

class PlayerPosition
{
    protected $position;

    public function __construct(string $position)
    {
        $this->position = $position;
    }

    public function toString()
    {
        return $this->position;
    }

    public function __toString()
    {
        return $this->toString();
    }
}
