<?php
namespace Phooty\Factories;

use Phooty\Models\Player;
use Phooty\Contracts\Factory as PhootyFactory;
use Phooty\Support\Faker\NameUtil;
use Phooty\Support\Traits\FakerAware;

class PlayerFactory implements PhootyFactory
{
    use FakerAware;

    /**
     * Factory manager instance
     *
     * @var FactoryManager
     */
    protected $factoryManager;

    public function __construct(FactoryManager $factoryManager = null) {
        $this->factoryManager = $factoryManager ?? new FactoryManager();

        $this->faker = $this->factoryManager->faker();
    }

    /**
     * Create a new Player.
     *
     * @param array $data Array of specific values that will be used instead of faker.
     * @param int $makeNicknames Generate the given number of nicknames (0 by default).
     *
     * @return Player
     */
    public function create(array $data = [], array $options = [])
    {
        $player = [
            'surname' => $data['surname'] ?? $this->faker->lastName,
            'givenNames' => $data['givenNames'] ?? $this->faker->firstName,
            'nicknames' => $data['nicknames'] ?? [],
        ];

        if (isset($options['makeNicknames'])
            && $options['makeNicknames'] >= 1
        ) {
            $util = $this->factoryManager->util(NameUtil::class);
            for ($i = 0; $i < $options['makeNicknames']; $i++) {
                $player['nicknames'][] = $util->nickname();
            }
        }

        return new Player(
            $player['surname'],
            $player['givenNames'],
            $player['nicknames']
        );
    }

    /**
     * Get factory manager instance
     *
     * @return  FactoryManager
     */ 
    public function manager()
    {
        return $this->factoryManager;
    }
}
