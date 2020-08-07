<?php
namespace Phooty\Support;

use Phooty\Support\{
    Bootstrap\BindConfiguration,
    Bootstrap\InitBindings,
    Bootstrap\InitFactories,
    Bootstrap\InitProviders,
    Container\ReflectionConstructor
};
use Pimple\{
    Container,
    Psr11\Container as Psr11Container
};

class BootstrapApp
{
    private string $rootDir;

    private array $stack;

    public function __construct(string $rootDir)
    {
        $this->rootDir = $rootDir;
    }

    private function initBootstrapperStack(Container $app)
    {
        $reflectionConstructor = new ReflectionConstructor(
            new Psr11Container($app)
        );
        $this->stack = [
            new BindConfiguration($this->rootDir . '/config'),
            new InitBindings($reflectionConstructor),
            new InitFactories($reflectionConstructor),
            new InitProviders($reflectionConstructor),
        ];
    }

    /**
     * Bootstrap the app container
     *
     * @param Container $app
     *
     * @return Container
     */
    public function bootstrap(Container $app)
    {
        isset($this->stack) ?: $this->initBootstrapperStack($app);

        foreach ($this->stack as $bootstrapper) {
            $app = call_user_func($bootstrapper, $app);
        }

        return $app;
    }
}
