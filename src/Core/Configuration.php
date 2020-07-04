<?php
namespace Phooty\Core;

class Configuration implements \ArrayAccess,
    \JsonSerializable,
    \Serializable
{
    protected array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        /* if (!$this->offsetExists($offset)) {
            throw new \InvalidArgumentException(
                'Invalid key: ' . $offset
            );
        } */

        return $this->items[$offset] ?? null;
    }

    public function offsetSet($offset, $value)
    {
        // does nothing
    }

    public function offsetUnset($offset)
    {
        // does nothing
    }

    public function toArray()
    {
        return $this->items;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function serialize()
    {
        return serialize($this->items);
    }

    public function unserialize($serialized)
    {
        $this->items = unserialize($serialized);
    }
}
