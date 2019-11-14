<?php
namespace Phooty\Config;

use Phooty\Support\Traits\FilesystemAware;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

class LoadConfigFromPaths
{
    use FilesystemAware;

    public function __construct(Filesystem $fs = null)
    {
        $this->fs = $fs ?? new Filesystem();
    }

    protected function pathToKey(string $path)
    {
        $hasExt = strrpos($path, ".");

        if (is_int($hasExt)) {
            $path = substr($path, 0, $hasExt);
        }

        return basename($path);
    }

    protected function loadFile(string $path)
    {
        $ext = substr(strrchr($path, "."), 1);
        // dd($ext);
        switch ($ext) {
            case 'php':
                return safeInclude($path);
            case 'json':
                return json_decode(file_get_contents($path), true);
            case 'yaml':
            case 'yml':
                return Yaml::parseFile($path);
            default:
                return null;
        }
    }

    protected function loadDir(string $path)
    {
        $files = scandir($path);

        $values = [];

        foreach ($files as $name) {
            if ($name !== '.' && $name !== '..') {
                $values[$this->pathToKey($name)] = is_dir(
                    $full = $path . DIRECTORY_SEPARATOR . $name
                ) ? $this->loadDir($full) : $this->loadFile($full);
                // load file
            }
        }

        return $values;
    }

    protected function loadPath(string $path)
    {
        if (is_dir($path)) {
            return $this->loadDir($path);
        } elseif (file_exists($path)) {
            return $this->loadFile($path);
        }
        return null;
    }

    /**
     * Load the app Config
     *
     * @param array|string $paths
     *
     * @return Config
     */
    public function load($paths = [])
    {
        $values = [];

        if (is_string($paths)) {
            $values = $this->loadPath($paths);
        } elseif (is_array($paths)) {
            foreach ($paths as $path) {
                $values = array_merge_recursive($values, $this->loadPath($path));
            }
        }

        $config = new Config($values);

        // TODO locate overrides
        return $config;
    }
}

function safeInclude(string $filename) {
    return include $filename;
}
