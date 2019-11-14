<?php
namespace Phooty\Contracts\App;

use Pimple\ServiceProviderInterface;
use Psr\Container\ContainerInterface;

interface Container extends ContainerInterface
{
    public function bind($id, callable $closure);

    public function register(ServiceProviderInterface $provider);

    public function alias(string $alias, $id);
}
