<?php
namespace Phooty\Simulation;

use Phooty\Simulation\Actions\Action;

class PassageOfPlay
{
    protected $actions = [];

    public function addAction(Action $action)
    {
        $this->actions[] = $action;
        return $this;
    }
}
