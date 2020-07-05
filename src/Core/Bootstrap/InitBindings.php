<?php
namespace Phooty\Core\Bootstrap;

use Phooty\Support\Container\ReflectionConstructor;
use Pimple\Container;

class InitBindings
{
    protected ReflectionConstructor $constructor;

    public function __construct(ReflectionConstructor $constructor)
    {
        $this->constructor = $constructor;
    }

    private function isValidBinding($binding)
    {
        // dd(class_implements($binding));

        return is_string($binding)
            && class_exists($binding);
    }

    public function __invoke(Container $app)
    {
        if (isset($app['config']['app']['bindings'])
            && is_array($app['config']['app']['bindings'])
            && !empty($app['config']['app']['bindings'])
        ) {

            foreach ($app['config']['app']['bindings'] as $key => $binding) {
                if (!$this->isValidBinding($binding)) {
                    continue;
                }

                is_string($key) ?: $key = $binding;

                // TODO handle constructors, etc
                $app[$key] = function () use ($binding) {
                    return $this->constructor->create($binding);
                };
            }
        }

        return $app;
    }
}
