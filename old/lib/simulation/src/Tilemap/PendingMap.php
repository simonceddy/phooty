<?php
namespace Phooty\Simulation\Tilemap;

use Illuminate\Contracts\Container\Container;

class PendingMap
{
    private $width;

    private $length;

    public function __construct(int $width, int $length)
    {
        $this->width = $width;

        $this->length = $length;
    }

    /**
     * Returns a Closure based tilemap loader
     *
     * @return \Closure
     */
    public function loader(): \Closure
    {
        return \Closure::fromCallable(function (Container $app) {
            return new Tilemap($app, $this->width, $this->length);
        });
    }

    public function create(Container $app)
    {
        return call_user_func($this->loader(), $app);
    }
}
