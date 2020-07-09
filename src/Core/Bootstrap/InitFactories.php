<?php
namespace Phooty\Core\Bootstrap;

use Phooty\Support\Container\{
    ReflectionConstructor,
    Validate
};
use Pimple\Container;

class InitFactories
{
    protected ReflectionConstructor $constructor;

    public function __construct(ReflectionConstructor $constructor)
    {
        $this->constructor = $constructor;
    }

    public function __invoke(Container $app)
    {
        if (isset($app['config']['app']['factories'])
            && is_array($app['config']['app']['factories'])
            && !empty($app['config']['app']['factories'])
        ) {

            foreach ($app['config']['app']['factories'] as $key => $factory) {
                if (!Validate::binding($factory)) {
                    continue;
                }

                if (is_string($factory)) {
                    is_string($key) ?: $key = $factory;
    
                    $app[$key] = $app->factory(function () use ($factory) {
                        return $this->constructor->create($factory);
                    });
                } else {
                    $app[$key] = $app->factory(function () use ($factory, $app) {
                        return call_user_func($factory, $app);
                    });
                }
            }
        }

        return $app;
    }
}
