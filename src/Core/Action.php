<?php
namespace Phooty\Core;

class Action
{
    protected $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function type()
    {
        return $this->type;
    }
}
