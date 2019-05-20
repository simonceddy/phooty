<?php
namespace Phooty\Simulation\Support;

use Illuminate\Config\Repository as Config;

class SimulationConfig extends Config
{
    private static $defaultConfig = [
        'timer' => [
            'periods' => 4,
            'period_length' => 120000,
        ],
    ];

    public function __construct(array $options = [])
    {
        parent::__construct($this->initConfig($options));
    }

    private function initConfig(array $options)
    {        
        if (empty($options)) {
            return static::$defaultConfig;
        }

        return array_replace_recursive(static::$defaultConfig, $options);
    }

    /**
     * Returns the default config as an array.
     *
     * @return array
     */
    public static function exportDefaults()
    {
        return self::$defaultConfig;
    }
}
