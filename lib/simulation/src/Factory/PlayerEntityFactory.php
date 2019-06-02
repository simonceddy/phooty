<?php
namespace Phooty\Simulation\Factory;

use Phooty\Simulation\Entities\PlayerEntity;
use Faker\Generator;

class PlayerEntityFactory
{
    /**
     * The Faker Generator instance
     *
     * @var Generator
     */
    protected $faker;

    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }

    public function create(array $data = [])
    {
        //dd($this->faker);
        return new PlayerEntity([
            'number' => $data['number'] ?? mt_rand(0, 99),
            'surname' => $data['surname'] ?? $this->faker->lastName(),
            'given_names' => $data['given_names'] ?? $this->faker->firstName(),
        ]);
    }
}
