<?php
namespace Phooty\Simulator\Support\Traits;

use Phooty\Contracts\Simulator\Ground as GroundContract;

trait AwareOfGround
{
    /**
     * The Ground object
     *
     * @var GroundContract
     */
    protected $ground;

    /**
     * Get the Ground object
     *
     * @return  GroundContract
     */ 
    public function getGround()
    {
        return $this->ground;
    }
}
