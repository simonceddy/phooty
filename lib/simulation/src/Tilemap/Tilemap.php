<?php
namespace Phooty\Simulation\Tilemap;

class Tilemap
{
    /**
     * The instantiated tiles.
     * 
     * Each column (x) with instantiated tiles has its own array of Tiles.
     * 
     * Tiles are stored y => Tile.
     *
     * @var array[]
     */
    protected $tiles = [];

    /**
     * Map width
     *
     * @var int
     */
    protected $width;

    /**
     * Map length
     *
     * @var int
     */
    protected $length;

    public function __construct(int $width, int $length)
    {
        if (1 > $width || 1 > $length) {
            throw new \InvalidArgumentException(
                "Width and length cannot be less than 1."
            );
        }

        $this->width = $width;
        $this->length = $length;
    }

    protected function validCoords(int $x, int $y): bool
    {
        return $x >= 1
            && $x <= $this->width
            && $y >= 1
            && $y <= $this->length;
    }

    public function tile(int $x, int $y): Tile
    {
        if (!$this->validCoords($x, $y)) {
            throw new \InvalidArgumentException(
                "Invalid coords. Coords cannot be less than 1 or greater than the map's dimensions."
            );
        }

        if (!isset($this->tiles[$x])) {
            $this->tiles[$x] = [];

            if (!isset($this->tiles[$x][$y])) {
                $this->tiles[$x][$y] = new Tile($x, $y, $this);
            }
        }

        return $this->tiles[$x][$y];
    }

    public function clearTile(int $x, int $y)
    {
        if (!isset($this->tiles[$x], $this->tiles[$x][$y])) {
            return false;
        }
        unset($this->tiles[$x][$y]);
        return $this;
    }

    public function toArray(): array
    {
        return [];
    }
}
