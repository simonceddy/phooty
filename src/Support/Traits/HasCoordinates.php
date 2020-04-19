<?php
namespace Phooty\Support\Traits;

trait HasCoordinates
{
    protected int $y;

    protected int $x;

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }
}
