<?php
namespace Phooty\Models;

class Player
{
    protected $surname;

    protected $givenNames;

    protected $nicknames;

    public function __construct(
        string $surname,
        string $givenNames = '',
        array $nicknames = []
    ) {
        // TODO validate surname
        $this->surname = $surname;
        $this->givenNames = $givenNames;
        $this->nicknames = $nicknames;
    }

    /**
     * Get the Player's surname. Must always return a string.
     *
     * @return string
     */
    public function surname()
    {
        return $this->surname;
    }

    /**
     * Return an array of the player's nicknames.
     * 
     * @return string[] The player's nicknames. Can be an empty array.
     */ 
    public function nicknames()
    {
        return empty($this->nicknames) ? false : $this->nicknames;
    }

    /**
     * Return the Player's given name(s)
     * 
     * @return string
     */ 
    public function givenNames()
    {
        return $this->givenNames;
    }

    /**
     * Return the Player's nickname.
     * 
     * If more than one nickname is set it will return a random nickname.
     * 
     * If no nicknames are set it will return false.
     *
     * @return string|false
     */
    public function nickname()
    {
        return empty($this->nicknames)
            ? false
            : $this->nicknames[array_rand($this->nicknames)];
    }
}
