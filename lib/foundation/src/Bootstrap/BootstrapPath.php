<?php
namespace Phooty\Foundation\Bootstrap;

use Phooty\Foundation\Path;

class BootstrapPath
{
    public function bootstrap(string $path = null, array $paths = [])
    {
        is_dir($path) ?: $path = $this->locateRootPath();
        $path = new Path($path);
        $path->bind('config', 'config');
        // todo bind paths
        return $path;
    }

    private function locateRootPath()
    {
        $dir = dirname(__DIR__, 3);
        while (!file_exists($dir.'/composer.json')
            && !file_exists($dir.'/vendor/autoload.php')
            && dirname($dir) !== $dir
        ) {
            $dir = dirname($dir);
        }
        return $dir;
    }
}
