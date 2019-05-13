<?php
namespace Phooty\Core\Bootstrap;

use Phooty\Core\Timer;

class BootstrapTimer
{
    public function bootstrap(int $period_length)
    {
        return new Timer($period_length);
    }
}
