<?php

namespace Phooty\Config;

class Env
{
    protected $values;

    public function __construct(array $env = null, array $server = null)
    {
        $this->values = array_merge($env ?? $_ENV, $server ?? $_SERVER);
    }

    public function toArray()
    {
        return $this->values;
    }
}
