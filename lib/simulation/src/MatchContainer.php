<?php
namespace Phooty\Simulation;

use Phooty\Simulation\Tilemap\Tilemap;
use Phooty\Simulation\Support\Traits\SimAware;

class MatchContainer
{
    use SimAware;
    
    /**
     * The Match's tilemap
     *
     * @var Tilemap
     */
    protected $tilemap;

    public function __construct(
        MatchSimulator $sim,
        Tilemap $tilemap
    ) {
        $this->sim = $sim;
        $this->tilemap = $tilemap;
    }

    /**
     * Get the Match's tilemap
     *
     * @return  Tilemap
     */ 
    public function getTilemap()
    {
        return $this->tilemap;
    }
}
