<?php
namespace Phooty\Simulation\Actions;

interface Action
{
    public function isStartAction(): bool;
    
    public function isStopAction(): bool;

    
}
