<?php
namespace Phooty\Models\Support;

use Phooty\Models\Player;

class PlayerRatings
{
    /**
     * Player model instance
     *
     * @var Player
     */
    protected $model;

    public function __construct(Player $model)
    {
        $this->model = $model;
    }
}
