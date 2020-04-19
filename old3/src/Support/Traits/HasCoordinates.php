<?php
namespace Phooty\Support\Traits;

use Ds\Vector;

trait HasCoordinates
{
    /**
     * The current coordinates
     *
     * @var Vector
     */
    protected $coords;

    public function moveTo(int $x, int $y)
    {
        isset($this->coords) ?: $this->coords = new Vector([0, 0]);
        $this->coords->set(0, $x);
        $this->coords->set(1, $y);
        return $this;
    }

    /**
     * Returns the current coordinates.
     * 
     * Returns a Vector object containing the x and y coordinates in that order.
     * 
     * If no coordinates have been set it will return null.
     *
     * @return Vector|null
     */
    public function getCoordinates()
    {
        return $this->coords;
    }

    /**
     * Get the current X coordinate.
     *
     * @return int
     */
    public function getX()
    {
        return $this->coords->get(0);
    }

    /**
     * Get the current Y coordinate.
     *
     * @return int
     */
    public function getY()
    {
        return $this->coords->get(1);
    }
}
