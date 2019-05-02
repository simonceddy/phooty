<?php
namespace Phooty\Crawler\Transport;

/**
 * Transport classes act as the mediator between the data extracted by the
 * crawler and a valid Entity.
 * 
 * Transport objects should be mutable until they become an Entity, whereas an
 * Entity, once created, should be immutable.
 * 
 * Currently very basic wrapper around ArrayObject.
 */
abstract class BaseTransport extends \ArrayObject implements \JsonSerializable
{
    public function __construct(array $items = [])
    {
        parent::__construct(
            $items, 
            static::ARRAY_AS_PROPS | static::STD_PROP_LIST
        );
    }

    public function jsonSerialize()
    {
        $data = $this->getArrayCopy();
        
        return $data;
    }
}
