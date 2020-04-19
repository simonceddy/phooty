<?php
namespace Phooty\Core\Bootstrap;

use Phooty\Config\Actions;
use Phooty\Exceptions\PhootyException;
use Phooty\Support\Traits\FilesystemAware;
use Symfony\Component\Filesystem\Filesystem;

class BootstrapActions
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
        $this->defaultConfig = dirname(__DIR__, 3) . '/config/actionTypes.json';
    }

    public function bootstrap()
    {
        if (!$this->fs->exists($this->defaultConfig)) {
            throw new PhootyException("Could not locate action configuration.");
        }

        $types = json_decode(file_get_contents($this->defaultConfig));
        
        if (!is_array($types)) {
            throw new PhootyException("Actions configuration is invalid.");
        }

        return new Actions($types);
    }
}
