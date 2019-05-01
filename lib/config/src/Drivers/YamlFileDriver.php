<?php
namespace Phooty\Config\Drivers;

use Symfony\Component\Yaml\Yaml;

class YamlFileDriver extends Driver
{
    public function load($resource)
    {
        if (!file_exists($resource)) {
            throw new \InvalidArgumentException(
                'Cannot locate '.$resource.'.'
            );
        }

        $contents = file_get_contents($resource);
        return Yaml::parse($contents);
    }
}
