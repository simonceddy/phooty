<?php
namespace Phooty\Foundation\Support;

class CheckInstallStatus
{
    public static function check(string $homeDir)
    {
        if (!is_dir($homeDir . '/.phooty')) {
            return false;
        }

        // check for db and config

        return true;
    }
}
