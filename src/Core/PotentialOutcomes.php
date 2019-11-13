<?php
namespace Phooty\Core;

class PotentialOutcomes
{
    /**
     * An array of outcomes.
     * 
     * The action type is the key and the base probability is the value.
     *
     * @var array
     */
    protected $outcomes;

    public function __construct(array $outcomes)
    {
        $this->outcomes = $outcomes;
    }

    /**
     * Returns the whole outcomes array.
     *
     * @return array
     */
    public function getAll()
    {
        return $this->outcomes;
    }
}
