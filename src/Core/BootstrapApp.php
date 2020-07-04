<?php
namespace Phooty\Core;

use Phooty\Core\Bootstrap\BindConfiguration;
use Phooty\Core\Bootstrap\InitBindings;
use Pimple\Container;

class BootstrapApp
{
    private string $rootDir;

    private array $stack;

    public function __construct(string $rootDir)
    {
        $this->rootDir = $rootDir;
    }

    private function initBootstrapperStack()
    {
        $this->stack = [
            new BindConfiguration($this->rootDir . '/config'),
            new InitBindings()
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
        isset($this->stack) ?: $this->initBootstrapperStack();

        foreach ($this->stack as $bootstrapper) {
            $app = call_user_func($bootstrapper, $app);
        }

        return $app;
    }
}
