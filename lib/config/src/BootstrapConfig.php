<?php
namespace Phooty\Config;

use Phooty\Config\Config;
use Phooty\Config\Drivers;

class BootstrapConfig
{
    private $drivers = [];

    public function __construct(array $drivers = [])
    {
        $this->initDrivers($drivers);
    }

    private function initDrivers(array $drivers)
    {
        if (empty($drivers)) {
            // todo: init default drivers
            $this->drivers = static::getDefaultDrivers();
            return;
        }
        $this->drivers = array_filter($drivers, function ($val, $key) {
            return is_string($key)
                && (class_exists($val))
                && (new \ReflectionClass($val))->implementsInterface(Driver::class);
        }, ARRAY_FILTER_USE_BOTH);
    }

    private static function getDefaultDrivers()
    {
        return [
            'php' => Drivers\PhpFileDriver::class,
            'json' => Drivers\JsonFileDriver::class,
            'yaml' => Drivers\YamlFileDriver::class,
            'yml' => Drivers\YamlFileDriver::class,
        ];
    }

    private function locateConfigFiles(string $path)
    {
        switch ($path) {
            case is_dir($path):
                $files = scandir($path);
                break;
            case file_exists($path):
                $files = [$path];
                break;
            default:
                $files = false;
        }
        return $files;
    }

    private function loadConfigFiles(string $path)
    {
        $files = $this->locateConfigFiles($path);
        
        if (!$files) {
            return false;
        }
        
        $items = [];
        
        foreach ($files as $file) {
            if ('.' !== $file && '..' !== $file) {
                $result = $this->loadConfigFile($path.'/'.$file);
                !$result ?: $items[$this->keyFromFilename($file)] = $result;
            }
        }
        
        return $items;
    }

    private function keyFromFilename(string $filename)
    {
        $bits = explode('.', $filename);
        return array_shift($bits);
    }
    
    private function extFromFilename(string $filename)
    {
        $bits = explode('.', $filename);
        return array_pop($bits);
    }

    private function loadConfigFile(string $filepath)
    {
        if (is_dir($filepath)) {
            return $this->loadConfigFiles($filepath);
        }
        
        if (!file_exists($filepath)) {
            throw new \Exception('Could not locate '.$filepath);
        }
        
        $driver = $this->driver($this->extFromFilename($filepath));

        return !$driver ? false : $driver->load($filepath);
    }

    protected function driver(string $ext)
    {
        $driver = false;
        switch ($ext) {
            case !isset($this->drivers[$ext]):
                break;
            case is_string($this->drivers[$ext]):
                $cn = $this->drivers[$ext];
                $this->drivers[$ext] = new $cn;
            case is_object($this->drivers[$ext]):
                $driver = $this->drivers[$ext];
                break;
        }
        return $driver;
    }

    public function bootstrap(array $paths)
    {
        $items = [];
        foreach ($paths as $path) {
            $items = array_merge_recursive($this->loadConfigFile($path));
        }
        return new Config($items);
    }
}
