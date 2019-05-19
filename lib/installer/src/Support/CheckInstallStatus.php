<?php
namespace Phooty\Installer\Support;

class CheckInstallStatus
{
    /**
     * The installation directory.
     * 
     * @var string
     */
    private $install_dir;

    public function __construct(string $install_dir)
    {
        $this->install_dir = $install_dir;
    }

    public function check(): bool
    {
        return is_dir($this->install_dir)
            && file_exists($this->install_dir.'/db.sqlite');
    }    
}
