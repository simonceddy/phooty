<?php
namespace Phooty\Support\Traits;

use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;

trait FakerAware
{
    /**
     * Faker instance
     *
     * @var FakerGenerator
     */
    protected $faker;

    public function faker()
    {
        isset($this->faker) ?: $this->faker = FakerFactory::create();
        return $this->faker;
    }
}
