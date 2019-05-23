<?php
namespace Phooty\Simulation\Entities;

/**
 * The PlayerEntity represents a Player within the Simulation.
 * 
 * This object should contain only vital information such as name, id, etc.
 * 
 * It should be immutable and never required to change. Changes in state, such
 * as movement and stats, are the responsibility of other classes.
 */
class PlayerEntity extends SimulationEntity
{
    /**
     * The Player's number
     *
     * @var int
     */
    protected $number;

    /**
     * The player's surname
     *
     * @var string
     */
    protected $surname;

    /**
     * The player's given name(s)
     *
     * @var string
     */
    protected $given_names;

    /**
     * An optional nickname or array of nicknames.
     * 
     * Is set to false if none are provided.
     *
     * @var string|string[]|false
     */
    protected $nicknames;

    protected function initialize(array $data)
    {
        // todo validate
        // must be int greater than 0
        $this->number = $data['number'];

        // must be string
        $this->surname = $data['surname'];
        
        // must be string
        $this->given_names = $data['given_names'];
        
        // optional
        // must be string or array of strings if set
        $this->nicknames = $data['nicknames'] ?? false;
    }

    /**
     * Get nicknames.
     * 
     * Returns false if no nicknames exist.
     *
     * @return  string|string[]|false
     */ 
    public function getNicknames()
    {
        return $this->nicknames;
    }

    /**
     * Get the Player's number
     *
     * @return  int
     */ 
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Get the player's surname
     *
     * @return  string
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Get the player's given name(s)
     *
     * @return  string
     */ 
    public function getGivenNames()
    {
        return $this->given_names;
    }
}
