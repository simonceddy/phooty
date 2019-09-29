<?php
namespace Phooty\Contracts\Core;

use Psr\Container\ContainerInterface;

interface Container extends ContainerInterface
{
    public function bind($id, callable $closure);
}
