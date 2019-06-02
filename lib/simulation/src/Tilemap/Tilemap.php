<?php
namespace Phooty\Simulation\Tilemap;

use Eddy\Tilemap\Tilemap as BaseTilemap;
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

    protected function createTile(int $x, int $y)
    {
        return new TileDecorator(
            new Tile($x, $y, $this),
            $this->app->make(Dispatcher::class)
        );
    }
}
