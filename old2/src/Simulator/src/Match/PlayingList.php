<?php
namespace Phooty\Simulator\Match;

/**
 * The PlayingList class acts as the container for a teams Player entities.
 * It is immutable once constructed.
 */
class PlayingList
{
    /**
     * Array of Player entities.
     *
     * @var array
     */
    protected $players;

    public function __construct(array $players)
    {
        // validate players
        $this->players = $players;
    }

    public function playerNum(int $number)
    {
        // 
    }
}  
