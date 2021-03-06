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
    __DIR__ . '/lib/config',
    __DIR__ . '/lib/console',
    __DIR__ . '/util/crawler',
    __DIR__ . '/util/orm',
    __DIR__ . '/lib/simulation',
]);
