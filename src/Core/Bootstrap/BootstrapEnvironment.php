<?php
namespace Phooty\Core\Bootstrap;

use Phooty\Core\Environment;

class BootstrapEnvironment
{
    public function bootstrap(array $env = [], array $server = [])
    {
        $env = array_merge($env, $_ENV);
        $server = array_merge($server, $_SERVER);
        // TODO: write logic here
        return new Environment($env, $server);
    }
}
