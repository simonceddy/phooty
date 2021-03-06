<?php
namespace Phooty\Support\Bootstrap;

use Phooty\Support\Container\{
    ReflectionConstructor,
    Validate
};
use Pimple\{
    Container,
    ServiceProviderInterface
};

class InitProviders
{
    protected ReflectionConstructor $constructor;

    public function __construct(ReflectionConstructor $constructor)
    {
        $this->constructor = $constructor;
    }
    
    private function isValidProvider($provider)
    {
        return is_string($provider)
            && class_exists($provider)
            && isset(
                class_implements($provider)[ServiceProviderInterface::class]
            );
    }

    public function __invoke(Container $app)
    {
        if (isset($app['config']['app']['providers'])
            && is_array($app['config']['app']['providers'])
            && !empty($app['config']['app']['providers'])
        ) {

            foreach ($app['config']['app']['providers'] as $provider) {
                if (!Validate::provider($provider)) {
                    throw new \Exception(
                        'Invalid provider!'
                    );
                }
                
                // TODO costructors etc
                $app->register($this->constructor->create($provider));
            }
        }

        return $app;
    }
}
