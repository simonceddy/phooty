<?php
namespace Phooty\Simulation\Support\Traits;

use Phooty\Simulation\Kernel;

trait KernelAware
{
    /**
     * The Timer instance
     *
     * @var Kernel
     */
    protected $kernel;

    /**
     * Get the Timer instance
     *
     * @return  Kernel
     */ 
    public function getKernel()
    {
        return $this->kernel;
    }
}
