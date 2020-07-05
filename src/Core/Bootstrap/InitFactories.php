<?php
namespace Phooty\Core\Bootstrap;

use Phooty\Support\Container\ReflectionConstructor;
use Pimple\Container;

class InitFactories
{
    protected ReflectionConstructor $constructor;

    public function __construct(ReflectionConstructor $constructor)
    {
        $this->constructor = $constructor;
    }

    private function isValidBinding($binding)
    {
        return is_string($binding)
            && class_exists($binding);
    }

    public function __invoke(Container $app)
    {
        if (isset($app['config']['app']['factories'])
            && is_array($app['config']['app']['factories'])
            && !empty($app['config']['app']['factories'])
        ) {

            foreach ($app['config']['app']['factories'] as $key => $factory) {
                if (!$this->isValidBinding($factory)) {
                    continue;
                }

                is_string($key) ?: $key = $factory;

                $app[$key] = $app->factory(function () use ($factory) {
                    return $this->constructor->create($factory);
                });
            }
        }

        return $app;
    }
}
