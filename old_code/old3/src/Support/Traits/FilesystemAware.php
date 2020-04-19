<?php
namespace Phooty\Support\Traits;

use Symfony\Component\Filesystem\Filesystem;

trait FilesystemAware
{
     /**
     * The Filesystem instance
     *
     * @var Filesystem
     */
    protected $fs;

    public function fs()
    {
        isset($this->fs) ?: $this->fs = new Filesystem();
        return $this->fs;
    }
}
