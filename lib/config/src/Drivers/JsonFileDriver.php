<?php
namespace Phooty\Config\Drivers;

use function GuzzleHttp\json_decode;

class JsonFileDriver extends Driver
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
