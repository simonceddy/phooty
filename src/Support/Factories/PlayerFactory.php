<?php
namespace Phooty\Support\Factories;

use Faker\Generator as FakerGenerator;
use Phooty\Models\Player;
use Phooty\Support\Faker\NameUtil;

class PlayerFactory extends BaseFactory
{
    /**
     * NameUtil instance
     *
     * @var NameUtil
     */
    protected $nameUtil;

    public function __construct(
        NameUtil $nameUtil = null,
        FakerGenerator $faker = null
    ) {
        parent::__construct($faker);
        $this->nameUtil = $nameUtil ?? new NameUtil($this->faker());
    }

    /**
     * @inheritDoc
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
            for ($i = 0; $i < $options['makeNicknames']; $i++) {
                $player['nicknames'][] = $this->nameUtil->nickname();
            }
        }

        return new Player(
            $player['surname'],
            $player['givenNames'],
            $player['nicknames']
        );
    }
}
