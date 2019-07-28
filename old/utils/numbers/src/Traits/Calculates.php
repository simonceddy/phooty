<?php
namespace Phooty\Numbers\Traits;

use Phooty\Numbers\StatCalc;

trait Calculates
{
    /**
     * Calculator instances
     *
     * @var array
     */
    protected $calculators = [];

    protected static $aliases = [
        'stat' => StatCalc::class
    ];

    public function calc(string $name)
    {
        if (!isset($this->calculators[$name])) {
            $this->calculators[$name] = $this->initCalculator($name);
        }

        return $this->calculators[$name];
    }

    protected function initCalculator(string $name)
    {
        if (isset(static::$aliases[$name])) {
            $cn = static::$aliases[$name];
            return new $cn();
        }
    }

    /**
     * Get the StatCalc instance
     *
     * @return StatCalc
     */
    public function statCalc()
    {
        return $this->calc('stat');
    }
}
