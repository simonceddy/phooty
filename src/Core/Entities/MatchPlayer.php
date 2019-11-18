<?php
namespace Phooty\Core\Entities;

use Phooty\Core\Traits\Moveable;

class MatchPlayer
{
    use Moveable;

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
}
