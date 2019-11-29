<?php
namespace Phooty\Models\Support;

use Phooty\Models\Player;
use Phooty\Support\Traits\HasPlayerModel;

class PlayerRatings
{
    use HasPlayerModel;

    /**
     * Kicking rating
     *
     * @var float
     */
    protected $kickingRating;

    /**
     * Disposal rating
     *
     * @var float
     */
    protected $disposalRating;

    /**
     * Ruck rating
     *
     * @var float
     */
    protected $ruckRating;

    public function __construct(Player $model, array $ratings)
    {
        $this->model = $model;
        $this->kickingRating = $ratings['kicking'] ?? 0;
        $this->disposalRating = $ratings['disposal'] ?? 0;
        $this->ruckRating = $ratings['ruck'] ?? 0;
    }
}
