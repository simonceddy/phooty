<?php
namespace Phooty\Support\Container;

use Psr\Container\ContainerInterface;

class ReflectionConstructor
{
    protected ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function resolveParameter(\ReflectionParameter $param)
    {
        if (($type = $param->getType()) !== null
            && $this->container->has($name = $type->getName())
        ) {
            // dd($param->getType());
            return $this->container->get($name);
        }

        if ($param->isDefaultValueAvailable()) {
            return $param->getDefaultValue();
        }

        return null;
    }

    protected function resolveConstructorParams(array $params)
    {
        $resolvedParams = [];

        foreach ($params as $param) {
            $resolvedParams[] = $this->resolveParameter($param);
        }

        return $resolvedParams;
    }

    public function create(string $className)
    {
        if (!class_exists($className)) {
            throw new \InvalidArgumentException(
                'Could not resolve ' . $className
            );
        }

        $reflection = new \ReflectionClass($className);

        $constructor = $reflection->getConstructor();

        if (!$constructor
            || empty($params = $constructor->getParameters())
        ) {
            return new $className;
        }

        $resolvedParams = $this->resolveConstructorParams($params);
        // dd($resolvedParams);

        return $reflection->newInstanceArgs($resolvedParams);
    }
}
