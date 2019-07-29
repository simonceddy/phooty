<?php
namespace Phooty\Simulator\Match;

use Phooty\Contracts\Simulator\Ground as GroundContract;

class Ground implements GroundContract
{
    protected $width;

    protected $height;

    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function width()
    {
        return $this->width;
    }
    
    public function height()
    {
        return $this->height;
    }
}
