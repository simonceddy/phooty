<?php
namespace Phooty\Simulation\Factory;

use Faker\Generator;
use Phooty\Simulation\Entities\PlayerEntity;
use Phooty\Simulation\Entities\Team;
use Illuminate\Support\Pluralizer;

class TeamFactory
{
    /**
     * The Faker Generator instance
     *
     * @var Generator
     */
    protected $faker;

    protected $playerFactory;

    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Get the PlayerEntityFactory
     *
     * @return PlayerEntityFactory
     */
    protected function playerFactory()
    {
        isset($this->playerFactory) ?: $this->playerFactory = new PlayerEntityFactory($this->faker);

        return $this->playerFactory;
    }

    public function create(array $data = [])
    {
        $city = $data['city'] ?? $this->faker->city;

        $name = $data['name'] ?? $this->getTeamName();
        
        $players = $this->createPlayingList();

        return new Team(
            ['city' => $city, 'name' => ucfirst($name)],
            $players,
            $data['away'] ?? false
        );
    }

    protected function getTeamName()
    {
        $cases = [
            0 => $this->faker->jobTitle,
            1 => $this->faker->company,
            2 => $this->faker->monthName,
            3 => $this->faker->name,
            4 => $this->faker->streetName,
            5 => $this->faker->title,
            6 => $this->faker->word,
        ];
        return Pluralizer::plural($cases[mt_rand(0, 6)]);
    }

    /**
     * Create a playing list
     *
     * @return PlayerEntity[]
     */
    protected function createPlayingList()
    {
        $list = [];

        $factory = $this->playerFactory();
        
        for ($i = 0; $i < 18; $i++) {
            $list[] = $factory->create();
        }
        
        $factory->resetNumbers();

        return $list;
    }
}
