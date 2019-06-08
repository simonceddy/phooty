<?php
namespace Phooty\Simulation\Factory;

use Phooty\Simulation\Entities\Player;
use Phooty\Simulation\Entities\Team;
use Illuminate\Support\Pluralizer;
use Phooty\Simulation\Support\Positions;
use Phooty\Simulation\Support\PlayerPosition;

class TeamFactory extends BaseFactory
{
    protected $playerFactory;

    /**
     * Get the PlayerEntityFactory
     *
     * @return PlayerEntityFactory
     */
    protected function playerFactory()
    {
        isset($this->playerFactory) ?: $this->playerFactory = $this->app->make(
            PlayerEntityFactory::class
        );

        return $this->playerFactory;
    }

    public function create(array $data = [])
    {
        $city = $data['city'] ?? $this->faker()->city;

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
            0 => $this->faker()->jobTitle,
            1 => $this->faker()->company,
            2 => $this->faker()->monthName,
            3 => $this->faker()->name,
            4 => $this->faker()->streetName,
            5 => $this->faker()->title,
            6 => $this->faker()->word,
        ];
        return Pluralizer::plural($cases[mt_rand(0, 6)]);
    }

    /**
     * Create a playing list
     *
     * @return Player[]
     */
    protected function createPlayingList()
    {
        $list = [];

        $positions = $this->app->make(Positions::class)->all();

        $factory = $this->playerFactory();
        
        for ($i = 0; $i < 18; $i++) {
            $list[] = $factory->create([
                'position' => new PlayerPosition(array_shift($positions))
            ]);
        }
        
        // Reset the numbers assigned.
        $factory->resetNumbers();

        return $list;
    }
}
