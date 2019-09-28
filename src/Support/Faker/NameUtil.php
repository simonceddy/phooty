<?php
namespace Phooty\Support\Faker;

use Faker\Generator as FakerGenerator;
use Phooty\Support\Traits\FakerAware;

class NameUtil
{
    use FakerAware;

    protected $generators = [];

    public function __construct(FakerGenerator $faker = null)
    {
        $faker === null ?: $this->faker = $faker;
        $this->initGenerators();
    }

    private function initGenerators()
    {
        array_push(
            $this->generators,
            function ($faker) {
                return $faker->jobTitle();
            },
            function ($faker) {
                return $faker->word;
            },
            function ($faker) {
                return $faker->domainWord;
            },
        );
    }

    public function nickname()
    {
        return call_user_func(
            $this->generators[array_rand($this->generators)],
            $this->faker()
        );
    }
}
