<?php
namespace Phooty\Config\Drivers;

class PhpFileDriver extends Driver
{
    public function load($resource)
    {
        if (!file_exists($resource)) {
            throw new \InvalidArgumentException(
                'Cannot locate '.$resource.'.'
            );
        }

        return includePhpFile($resource);
    }
}

function includePhpFile(string $filepath)
{
    if (!file_exists($filepath)) {
        throw new \InvalidArgumentException(
            'Cannot locate '.$filepath.'.'
        );
    }
    $loader = \Closure::fromCallable(function (string $filepath) {
        return include $filepath;
    });
    return $loader($filepath);
}
