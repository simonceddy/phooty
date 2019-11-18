<?php
namespace Phooty\Core\Entities;

use Phooty\Core\Traits\Moveable;

class Sherrin
{
    use Moveable;

    /**
     * The Entity in possession of the Sherrin. Must be null if in dispute.
     *
     * @var MatchPlayer|null
     */
    protected $heldBy;

    public function __construct(MatchPlayer $heldBy = null)
    {
        $this->heldBy = $heldBy;
    }

    public function held()
    {
        return $this->heldBy !== null;
    }

    public function heldBy()
    {
        return $this->heldBy;
    }
}
