<?php
namespace Phooty\Core;

class Grid
{
    protected $width;

    protected $height;

    public function __construct(int $height, int $width)
    {
        if ($height < 1 || $width < 1) {
            throw new \InvalidArgumentException(
                "Grid dimensions cannot be less than 1 * 1! {$height} * {$width} given!"
            );
        }

        $this->height = $height;
        $this->width = $width;
    }
}
