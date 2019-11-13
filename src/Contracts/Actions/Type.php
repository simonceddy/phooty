<?php
namespace Phooty\Contracts\Actions;

interface Type
{
    /**
     * Get the action type.
     * 
     * Must return a string with a valid action type.
     *
     * @return string
     */
    public function type();
}
