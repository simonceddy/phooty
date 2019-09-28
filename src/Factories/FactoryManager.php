<?php
namespace Phooty\Factories;

use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;
use Phooty\Support\Faker\NameUtil;
use Phooty\Support\Traits\FakerAware;

class FactoryManager
{
    use FakerAware;

    protected $utilAliases = [
        'name' => NameUtil::class
    ];

    protected $factoryAliases = [
        'player' => PlayerFactory::class
    ];

    protected $utils = [];

    protected $factoryInstances = [];

    public function __construct(FakerGenerator $faker = null)
    {
        $this->faker = $faker ?? FakerFactory::create();
    }

    public function factory(string $name)
    {
        if (isset($this->factoryAliases[$name])) {
            $name = $this->factoryAliases[$name];
        }

        if (!isset($this->factoryInstances[$name])) {
            if (class_exists($name)) {
                $this->factoryInstances[$name] = new $name($this);
            } else {
                throw new \Exception("Undefined factory: {$name}");
            }
        }
        return $this->factoryInstances[$name];
    }

    public function util(string $name)
    {
        if (isset($this->utilAliases[$name])) {
            $name = $this->utilAliases[$name];
        }
        if (!isset($this->utils[$name])) {
            if (class_exists($name)) {
                $this->utils[$name] = new $name($this->faker());
            } else {
                throw new \Exception("Undefined util: {$name}");
            }
        }
        return $this->utils[$name];
    }

    public function __get(string $name)
    {
        $name = strtolower($name);
        switch ($name) {
            case 'faker':
                return $this->faker;
            default:
                return $this->factory($name);
        }        
    }
}
