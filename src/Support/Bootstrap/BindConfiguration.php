<?php
namespace Phooty\Support\Bootstrap;

use Phooty\Core\Configuration;
use Phooty\Support\Filesystem\LoadConfigFiles;
use Pimple\Container;

class BindConfiguration
{
    private string $configDir;

    public function __construct(string $configDir)
    {
        if (!is_dir($configDir)) {
            throw new \InvalidArgumentException(
                'Could not locate ' . $configDir
            );
        }
        
        $this->configDir = $configDir;
    }

    public function __invoke(Container $app)
    {
        $app['config'] = function () {
            return new Configuration(
                (new LoadConfigFiles())->from($this->configDir)
            );
        };

        return $app;
    }
}
