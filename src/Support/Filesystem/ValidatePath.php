<?php

namespace Phooty\Support\Filesystem;

class ValidatePath
{
    /**
     * Validate the given path and return SplFileInfo object
     *
     * @param \SplFileInfo|string $path
     *
     * @return \SplFileInfo
     * 
     * @throws \InvalidArgumentException Thrown if $path is an invalid type
     * @throws \InvalidArgumentException Thrown if $path is not a valid path
     * @throws \InvalidArgumentException Thrown if $path is not readable
     */
    public function validFileInfo($path)
    {
        if (!($path instanceof \SplFileInfo)) {
            if (!is_string($path)) {
                throw new \InvalidArgumentException(
                    'The from() method only accepts strings or SplFileInfo objects.'
                );
            }
            if (!file_exists($path)) {
                throw new \InvalidArgumentException(
                    'Could not locate ' . $path
                );
            }
            $path = new \SplFileInfo($path);
        } 
        
        if (!$path->isReadable()) {
            throw new \InvalidArgumentException(
                'Could not read ' . $path
            );
        }

        return $path;
    }
}
