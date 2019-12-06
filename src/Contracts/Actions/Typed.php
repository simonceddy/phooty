<?php
namespace Phooty\Contracts\Actions;

interface Typed
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
