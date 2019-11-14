<?php
namespace Phooty\Contracts\App;

use Psr\Container\ContainerInterface;

interface Container extends ContainerInterface
{
    public function bind($id, callable $closure);
}
