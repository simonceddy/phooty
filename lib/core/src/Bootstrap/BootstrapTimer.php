<?php
namespace Phooty\Core\Bootstrap;

use Phooty\Config\Config;
use Phooty\Core\Timer;

class BootstrapTimer
{
    public function bootstrap(Config $config)
    {
        return new Timer($config->get('phooty.sim.match.period_length'));
    }
}
