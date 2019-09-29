<?php

namespace Phooty\Core;

class Environment
{
    /**
     * Combined env and server arrays
     *
     * @var array
     */
    protected $vars;

    public function __construct(array $env, array $server)
    {
        // TODO
        $this->vars = array_merge($env, $server);
    }

    public function get(string $key)
    {
        // TODO: write logic here
        return $this->vars[$key] ?? null;
    }
}
