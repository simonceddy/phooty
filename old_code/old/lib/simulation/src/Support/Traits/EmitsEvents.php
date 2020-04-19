<?php
namespace Phooty\Simulation\Support\Traits;

use Phooty\Simulation\Emitter;

trait EmitsEvents
{
    /**
     * The Emitter instance
     *
     * @var Emitter
     */
    protected $emitter;

    /**
     * Get the Emitter instance
     *
     * @return  Emitter
     */ 
    public function emitter()
    {
        return $this->emitter;
    }

    public function emit(string $name, array $args = [])
    {
        if (!isset($this->emitter)) {
            throw new \Exception(
                "Emitter is not set!"
            );
        }

        return $this->emitter->emit($name, $args);
    }
}
