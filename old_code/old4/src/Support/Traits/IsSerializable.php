<?php
namespace Phooty\Support\Traits;

trait IsSerializable
{
    abstract public function toArray();

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function serialize()
    {
        return $this->toArray();
    }
}
