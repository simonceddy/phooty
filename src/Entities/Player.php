<?php
namespace Phooty\Entities;

use Phooty\Entities\Support\HasNicknames;

/**
 * A Player object contains the personal information of the player.
 * 
 * This includes the players name and any nicknames.
 */
class Player
{
    use HasNicknames;

    protected string $firstName;

    protected string $lastName;

    /**
     * Create a new Player object
     *
     * @param string $firstName The Player's first name
     * @param string $lastName The Player's last name
     * @param string[] $nicknames (optional) The player's nicknames, if any
     */
    public function __construct(
        string $firstName,
        string $lastName,
        array $nicknames = []
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;

        empty($nicknames) ?: $this->nicknames = $nicknames;
    }

    /**
     * Get the player's first name
     *
     * @return string
     */
    public function firstName()
    {
        return $this->firstName;
    }

    /**
     * Get the player's last name
     *
     * @return string
     */
    public function lastName()
    {
        return $this->lastName;
    }

    public function __get(string $name)
    {
        switch ($name) {
            case 'lastName':
                return $this->lastName;
            case 'firstName':
                return $this->firstName;
            case 'nicknames':
                return $this->nicknames();
        }

        throw new \Exception(
            'Unknown property: ' . $name
        );
    }
}
