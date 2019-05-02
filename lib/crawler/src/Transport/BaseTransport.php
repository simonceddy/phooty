<?php
namespace Phooty\Crawler\Transport;

abstract class BaseTransport extends \ArrayObject
{
    public function __construct(array $items = [])
    {
        parent::__construct(
            $items, 
            static::ARRAY_AS_PROPS | static::STD_PROP_LIST
        );
    }
}
