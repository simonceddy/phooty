<?php

namespace Phooty\Support\Filesystem;

use Phooty\Support\Text;

class LoadConfigFiles
{
    private ValidatePath $validate;

    private function loadFile(\SplFileInfo $fileInfo)
    {
        // dd($fileInfo);
        if ($fileInfo->getExtension() === 'php') {
            return includePhpFile($fileInfo);
        }

        return null;
    }

    private function loadDirectory(\SplFileInfo $path)
    {
        $items = [];
        $files = scandir($path);

        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            if (is_dir($fullPath = ($path . '/' . $file))) {
                $items[$file] = $this->loadDirectory($fullPath);
            } else {
                $items[(new Text($file))->trimLastDot()] = $this->loadFile(
                    new \SplFileInfo($fullPath)
                );
            }
        }

        return $items;
    }

    /**
     * Loads config files from the given path into an array
     *
     * @param \SplFileInfo|string $path
     *
     * @return array
     */
    public function from($path)
    {
        if (!isset($this->validate)) {
            $this->validate = new ValidatePath();
        }

        $fileInfo = $this->validate->validFileInfo($path);

        if (!$fileInfo->isDir()) {
            return $this->loadFile($fileInfo);
        }

        return $this->loadDirectory($fileInfo);
    }
}

function includePhpFile(string $path)
{
    return include $path;
}
