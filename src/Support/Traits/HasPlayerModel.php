<?php
namespace Phooty\Support\Traits;

use Phooty\Models\Player;

trait HasPlayerModel
{
    /**
     * The Player model
     *
     * @var Player|null
     */
    protected $model;

    /**
     * Returns the parent model.
     * 
     * @return Player|null
     */ 
    public function model()
    {
        return $this->model;
    }
}
