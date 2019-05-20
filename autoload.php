<?php
function autoload(array $paths)
{
    foreach ($paths as $path) {
        switch ($path) {
            case file_exists($path) && !is_dir($path):
                // assume path is autoloader
                break;
            case file_exists($path.'/autoload.php'):
                $path .= '/autoload.php';
                break;
            case file_exists($path.'/vendor/autoload.php'):
                $path .= '/vendor/autoload.php';
                break;
            default:
                $path = false;
        }
        !$path ?: require_once $path;
    }
}

autoload([
    __DIR__ . '/lib/contract',
    __DIR__ . '/lib/foundation',
    __DIR__ . '/lib/config',
    __DIR__ . '/lib/console',
    __DIR__ . '/lib/core',
    __DIR__ . '/lib/crawler',
    __DIR__ . '/lib/orm',
    __DIR__ . '/lib/support',
    __DIR__ . '/lib/installer',
    __DIR__ . '/lib/simulation',
]);
