<?php
namespace Phooty\Simulation\Factory;

use Phooty\Simulation\Entities\Player;
use Faker\Generator;

class PlayerEntityFactory
{
    /**
     * The Faker Generator instance
     *
     * @var Generator
     */
    protected $faker;

    /**
     * Array of already assigned numbers
     *
     * @var array
     */
    protected $numbers = [];

    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }

    public function create(array $data = [])
    {
        //dd($this->faker);
        if (100 <= count($this->numbers)) {
            throw new \Exception(
                "No numbers are available. Use resetNumbers() to reset the Factory."
            );
        }

        $num = $data['number'] ?? mt_rand(0, 99);
        
        // potential for infinite loop - wip
        while (in_array($num, $this->numbers)) {
            $num = mt_rand(0, 99);
        }

        return new Player([
            'number' => $data['number'] ?? mt_rand(0, 99),
            'surname' => $data['surname'] ?? $this->faker->lastName(),
            'given_names' => $data['given_names'] ?? $this->faker->firstName(),
        ]);
    }

    public function resetNumbers()
    {
        $this->numbers = [];
        return $this;
    }
}
