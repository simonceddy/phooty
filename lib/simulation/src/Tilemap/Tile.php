<?php
namespace Phooty\Simulation\Tilemap;

class Tile
{
    /**
     * The Tilemap instance
     *
     * @var Tilemap
     */
    protected $tilemap;

    /**
     * The x coord
     *
     * @var int
     */
    protected $x;

    /**
     * The y coord
     *
     * @var int
     */
    protected $y;

    public function __construct(int $x, int $y, Tilemap $tilemap)
    {
        $this->tilemap = $tilemap;
        $this->x = $x;
        $this->y = $y;
    }

    public function toArray(): array
    {
        return [];
    }

    /**
     * Get the x coord
     *
     * @return  int
     */ 
    public function getX()
    {
        return $this->x;
    }

    /**
     * Get the y coord
     *
     * @return  int
     */ 
    public function getY()
    {
        return $this->y;
    }

    public function getCoords()
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
        ];
    }
}
