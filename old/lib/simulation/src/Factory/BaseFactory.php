<?php
namespace Phooty\Simulation\Factory;

use Phooty\Simulation\Support\Traits\AppAware;
use Illuminate\Contracts\Container\Container;
use Faker\Generator;

abstract class BaseFactory
{
    use AppAware;

    /**
     * The Faker Generator instance
     *
     * @var Generator
     */
    protected $faker;

    abstract public function create(array $data = []);

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    protected function faker()
    {
        isset($this->faker) ?: $this->faker = $this->app->make(Generator::class);

        return $this->faker;
    }
}
