<?php
namespace Phooty\Core\Bootstrap;

use Phooty\Core\Config;
use Phooty\Support\Traits\FilesystemAware;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

class BootstrapConfig
{
    use FilesystemAware;

    /**
     * The path to the default config file.
     *
     * @var string
     */
    private $defaultConfig;

    public function __construct(Filesystem $fs = null)
    {
        $this->fs = $fs ?? new Filesystem();
        $this->defaultConfig = dirname(__DIR__, 3) . '/config/default.yml';
    }

    public function bootstrap(array $paths = [])
    {
        $values = [];
        if ($this->fs->exists($this->defaultConfig)) {
           $values = Yaml::parseFile($this->defaultConfig);
        }

        $config = new Config($values);

        // TODO locate overrides
        return $config;
    }
}
