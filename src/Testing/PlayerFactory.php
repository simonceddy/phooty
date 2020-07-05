<?php
namespace Phooty\Testing;

use Faker\Generator;
use Phooty\Entities\Player;
use Phooty\Testing\Support\HasFaker;

class PlayerFactory implements Factory
{
    use HasFaker;

    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }

    public function make(array $values = [])
    {
        return new Player(
            isset($values['firstName']) ? $values['firstName'] : $this->faker->firstName,
            isset($values['lastName']) ? $values['lastName'] : $this->faker->lastName,
            isset($values['nicknames']) ? $values['nicknames'] : []
        );
    }
}
