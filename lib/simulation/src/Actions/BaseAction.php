<?php
namespace Phooty\Simulation\Actions;

abstract class BaseAction implements Action
{
    public function isStartAction(): bool
    {
        return false;
    }

    public function isStopAction(): bool
    {
        return false;
    }
}
