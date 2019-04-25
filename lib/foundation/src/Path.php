<?php
namespace Phooty\Foundation;

class Path
{
    private $root_path;

    private $shortcuts = [];

    public function __construct(string $root_path)
    {
        if (!is_dir($root_path)) {
            throw new \InvalidArgumentException(
                "Could not locate {$root_path}."
            );
        }
        $this->root_path = realpath($root_path);
    }

    public function bind(string $path, string $shortcut = null)
    {
        if (!file_exists($path)
            && !file_exists($path = $this->root_path.'/'.$path)
        ) {
            throw new \InvalidArgumentException(
                "Could not locate {$path}."
            );
        }
        null !== $shortcut ?: $shortcut = $path;
        if (isset($this->shortcuts[$shortcut])) {
            throw new \LogicException(
                "Attempting to register duplicate shortcut: \"{$shortcut}\""
            );
        }
        $this->shortcuts[$shortcut] = realpath($path);
        return $this;
    }

    public function get(string $path = null)
    {
        switch ($path) {
            case (null === $path):
                return $this->root_path;
            case (isset($this->shortcuts[$path])):
                return $this->shortcuts[$path];
            case (file_exists($path)):
                return realpath($path);
            case (file_exists($fn = $this->root_path.'/'.$path)):
                return realpath($fn);
        }

        throw new \InvalidArgumentException(
            "Could not locate {$path}"
        );
    }

    public function __toString()
    {
        return $this->root_path;
    }
}
