<?php
namespace Phooty\Testing;

use Faker\Generator;
use Phooty\Entities\Team;
use Phooty\Testing\Support\HasFaker;

class TeamFactory implements Factory
{
    use HasFaker;

    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }

    public function make(array $values = [])
    {
        return new Team(
            isset($values['city']) ? $values['city'] : $this->faker->city,
            isset($values['name']) ? $values['name'] : $this->faker->jobTitle,
            isset($values['nicknames']) ? $values['nicknames'] : []
        );
    }
}
