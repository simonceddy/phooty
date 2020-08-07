<?php
namespace Phooty\Support\Bootstrap;

use Phooty\Support\Container\{
    ReflectionConstructor,
    Validate
};
use Pimple\Container;

class InitBindings
{
    protected ReflectionConstructor $constructor;

    public function __construct(ReflectionConstructor $constructor)
    {
        $this->constructor = $constructor;
    }

    public function __invoke(Container $app)
    {
        if (isset($app['config']['app']['bindings'])
            && is_array($app['config']['app']['bindings'])
            && !empty($app['config']['app']['bindings'])
        ) {

            foreach ($app['config']['app']['bindings'] as $key => $binding) {
                if (!Validate::binding($binding)) {
                    continue;
                }

                if (is_string($binding)) {
                    is_string($key) ?: $key = $binding;
    
                    $app[$key] = function () use ($binding) {
                        return $this->constructor->create($binding);
                    };
                } else {
                    $app[$key] = function () use ($binding, $app) {
                        return call_user_func($binding, $app);
                    };
                }
            }
        }

        return $app;
    }
}
