<?php
namespace Phooty\Core;

use Pimple\Container;

class Application
{
    protected Container $pimple;

    public function __construct(Container $pimple)
    {
        $this->pimple = $pimple;
    }

    /**
     * Get the underlying Pimple Container instance
     * 
     * @return Container
     */ 
    public function container()
    {
        return $this->pimple;
    }
}
