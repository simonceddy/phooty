<?php
namespace Phooty\Support\Container;

use Pimple\ServiceProviderInterface;

class Validate
{
    public static function binding($binding)
    {
        return (is_string($binding)
            && class_exists($binding))
            || is_callable($binding);
    }

    public static function provider($provider)
    {
        return is_string($provider)
            && class_exists($provider)
            && isset(
                class_implements($provider)[ServiceProviderInterface::class]
            );
    }
}
