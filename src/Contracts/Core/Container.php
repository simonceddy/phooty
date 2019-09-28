<?php
namespace Phooty\Contracts\Core;

use Psr\Container\ContainerInterface;

interface Container extends ContainerInterface
{
    public function add($id, callable $closure);

    public function factory($id, callable $closure);
}
