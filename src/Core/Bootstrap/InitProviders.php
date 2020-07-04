<?php
namespace Phooty\Core\Bootstrap;

use Pimple\Container;

class InitBindings
{
    private function isValidProvider($provider)
    {
        dd(class_implements($provider));

        return is_string($provider)
            && class_exists($provider)
            ;
    }

    public function __invoke(Container $app)
    {
        if (isset($app['config']['app']['providers'])
            && is_array($app['config']['app']['providers'])
            && !empty($app['config']['app']['providers'])
        ) {
            foreach ($app['config']['app']['providers'] as $provider) {
                if (!$this->isValidProvider($provider)) {
                    throw new \Exception(
                        'Invalid provider!'
                    );
                }

                // TODO costructors etc
                $app->register(new $provider());
            }
        }

        return $app;
    }
}
