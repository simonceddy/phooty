<?php

namespace Phooty\Entities;

use Phooty\Models\Player;
use Phooty\Support\Traits\HasCoordinates;
use Phooty\Support\Traits\HasPlayerModel;

class ActivePlayer
{
    use HasCoordinates, HasPlayerModel;

    public function __construct(Player $model)
    {
        $this->model = $model;
    }
}
