<?php
namespace Phooty\Config\Drivers;

class JsonFileDriver implements Driver
{
    public function load($resource)
    {
        if (!file_exists($resource)) {
            throw new \InvalidArgumentException(
                'Cannot locate '.$resource.'.'
            );
        }

        $contents = file_get_contents($resource);
        return json_decode($contents, true);
    }
}
