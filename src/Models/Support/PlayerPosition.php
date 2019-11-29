<?php
namespace Phooty\Models\Support;

use Phooty\Support\Traits\HasPlayerModel;

class PlayerPosition
{
    use HasPlayerModel;

    public function __construct(Player $model)
    {
        $this->model = $model;
    }
}
