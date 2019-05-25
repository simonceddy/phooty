<?php
namespace Phooty\Simulation\Tilemap;

use Eddy\Tilemap\Tilemap as BaseTilemap;
use Eddy\Tilemap\TileInterface;
use Eddy\Tilemap\Tile;
use Phooty\Simulation\Support\Traits\AppAware;
use Illuminate\Contracts\Container\Container;
use Phooty\Simulation\Dispatcher;

class Tilemap extends BaseTilemap
{
    use AppAware;

    public function __construct(Container $app, int $width, int $length)
    {
        $this->app = $app;
        parent::__construct($width, $length);
    }

    public function tile(int $x, int $y): TileInterface
    {
        if (!$this->validCoords($x, $y)) {
            throw new \InvalidArgumentException(
                "Invalid coords. Coords cannot be less than 1 or greater than the map's dimensions."
            );
        }

        if (!isset($this->tiles[$x])) {
            $this->tiles[$x] = [];

            if (!isset($this->tiles[$x][$y])) {
                $this->tiles[$x][$y] = new TileDecorator(
                    new Tile($x, $y, $this),
                    $this->app->make(Dispatcher::class)
            );
            }
        }

        return $this->tiles[$x][$y];
    }
}
