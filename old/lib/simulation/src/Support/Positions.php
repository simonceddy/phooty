<?php
namespace Phooty\Simulation\Support;

class Positions
{
    /**
     * Array of player positions
     *
     * @var array
     */
    protected $positions;

    public function __construct(array $positions)
    {
        $this->positions = $positions;
    }

    public function all()
    {
        return $this->positions;
    }
}
