<?php
namespace Phooty\Models;

/**
 * The Ground model is responsible for recording the dimensions of the ground,
 * and any applicable metadata (TODO).
 */
class Ground
{
    /**
     * The length of the ground.
     *
     * @var int
     */
    protected $length;

    /**
     * The width of the ground.
     *
     * @var int
     */
    protected $width;

    public function __construct(int $length, int $width)
    {
        if ($length < 1 || $width < 1) {
            throw new \InvalidArgumentException(
                "Length and width must be greater than 1."
            );
        }
        $this->length = $length;
        $this->width = $width;
    }

    /**
     * Get the width of the ground
     */ 
    public function width()
    {
        return $this->width;
    }

    /**
     * Get the length of the ground
     */ 
    public function length()
    {
        return $this->length;
    }
}
