<?php
namespace Phooty\Support\Traits;

trait ArraySettersDisabled
{
    /**
     * Overriding offsetUnset to do nothing.
     *
     * @param string|int $offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        return;
    }

    /**
     * Overriding offsetSet to do nothing.
     *
     * @param string|int $offset
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        return;
    }
}
