<?php

namespace Phooty\Entities;

use Phooty\Models\Player;
use Phooty\Support\Traits\HasCoordinates;

class ActivePlayer
{
    use HasCoordinates;

    protected $model;

    public function __construct(Player $model)
    {
        $this->model = $model;
    }

    public function model()
    {
        return $this->model;
    }
}
