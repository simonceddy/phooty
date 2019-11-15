<?php
namespace Phooty\Support\Config;

/**
 * This class provides static factories for creating action config.
 * 
 * It should only be used for configuration. Once configuration is cached, this
 * class should never be called.
 * 
 * Work in progress - may be dropped.
 */
class ActionType
{
    public static function player(string $name, string $type = '', array $outcomes = [])
    {
        return [
            $name => [
                'type' => $type,
                'outcomes' => $outcomes,
            ]
        ];
    }
}
