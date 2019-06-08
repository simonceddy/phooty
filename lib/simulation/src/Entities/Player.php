<?php
namespace Phooty\Simulation\Entities;

use Phooty\Simulation\Support\Stats\Statline;

/**
 * The PlayerEntity represents a Player within the Simulation.
 * 
 * This object should contain only vital information such as name, id, etc.
 * 
 * It should be immutable and never required to change. Changes in state, such
 * as movement and stats, are the responsibility of other classes.
 */
class Player extends SimulationEntity
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

    /**
     * The Player's Statline
     *
     * @var Statline
     */
    protected $statline;

    /**
     * The player's Team
     *
     * @var Team
     */
    protected $team;

    /**
     * The Player's position.
     *
     * @var Position
     */
    protected $position;

    protected function initialize(array $data)
    {
        // todo validate
        $this->position = $data['position'];

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

    /**
     * Get the player's Team
     *
     * @return  Team
     */ 
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set the player's Team
     *
     * @param  Team  $team  The player's Team
     *
     * @return  self
     */ 
    public function setTeam(Team $team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get the Player's Statline
     *
     * @return  Statline
     */ 
    public function getStats()
    {
        return $this->statline;
    }

    /**
     * Set the Player's Statline
     *
     * @param  Statline  $statline  The Player's Statline
     *
     * @return  self
     */ 
    public function setStatline(Statline $statline)
    {
        $this->statline = $statline;

        return $this;
    }
}
