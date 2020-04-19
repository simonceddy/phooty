<?php
namespace Phooty\Simulation\Actions\Umpire;

use Phooty\Simulation\Actions\StartAction;

class CenterBounce extends StartAction
{
    protected function willBeRecalled(): bool
    {
        return 1 === mt_rand(1, 5);
    }
}
