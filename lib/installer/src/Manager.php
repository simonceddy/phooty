<?php
namespace Phooty\Installer;

use Phooty\Installer\Support\CheckInstallStatus;

class Manager
{
    private $install_dir;

    private $installed;

    public function __construct(string $install_dir = null)
    {
        $this->install_dir = $install_dir ?? $_SERVER['home'] . '/.phooty';

        $this->installed = $this->checkInstallStatus();
    }

    private function checkInstallStatus()
    {
        return (new CheckInstallStatus($this->install_dir))->check();
    }
}
