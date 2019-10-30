<?php
namespace Phooty\Support\Types;

use Phooty\Support\Traits\ArraySettersDisabled;

/**
 * The UntouchableArray class acts as a read only array.
 * 
 * It's keys and values are limited to the contents of an array passed to the
 * constructor.
 * 
 * Setting or unsetting values after the object has been constructed does
 * nothing by default.
 */
class UntouchableArray implements \ArrayAccess, \JsonSerializable
{
    use ArraySettersDisabled;

    /**
     * Array of stored items
     *
     * @var array
     */
    protected $storage;

    public function __construct(array $storage = []) {
        $this->storage = $storage;
    }

    /**
     * Check if an offset exists in storage.
     *
     * @param int|string $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->storage[$offset]);
    }

    /**
     * Get the value of the given offset from storage.
     * 
     * Returns null if no offset exists.
     *
     * @param int|string $offset
     *
     * @return mixed|false
     */
    public function offsetGet($offset)
    {
        return $this->storage[$offset] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return array_values($this->storage);
    }
}
