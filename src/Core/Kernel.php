<?php
namespace Phooty\Core;

use Phooty\Contracts\Core\Container as PhootyContainer;
use Phooty\Support\Providers\FactoryProvider;
use Pimple\Container;

class Kernel implements PhootyContainer, \ArrayAccess
{
    /**
     * The Container instance
     *
     * @var Container
     */
    protected $container;

    public function __construct(Container $pimple = null)
    {
        $this->container = $pimple ?? new Container();
        $this->loadProviders();
    }

    private function loadProviders()
    {
        (new FactoryProvider())->register($this->container);
    }

    public function container()
    {
        return $this->container;
    }

    public function get($id)
    {
        return $this->container[$id];
    }

    public function has($id)
    {
        return isset($this->container[$id]);
    }

    public function factory($id, callable $closure)
    {
        $this->container[$id] = $this->container->factory($closure);
        return $this;
    }

    public function add($id, callable $closure)
    {
        $this->container[$id] = $closure;
        return $this;
    }

    public function offsetExists($offset)
    {
        return $this->container->offsetExists($offset);
    }

    public function offsetGet($offset)
    {
        return $this->container->offsetGet($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->container->offsetSet($offset, $value);
        return $this;
    }

    public function offsetUnset($offset)
    {
        return $this->container->offsetUnet($offset);
    }
}
