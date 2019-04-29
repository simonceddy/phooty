<?php
namespace Phooty\Orm\Entities;

/**
 * @Entity @Table(name="players")
 */
class Player
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $surname;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $given_names;

    /**
     * Get the Player's id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of surname
     *
     * @return  string
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @param  string  $surname
     *
     * @return  self
     */ 
    public function setSurname(string $surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of given_names
     *
     * @return  string
     */ 
    public function getGivenNames()
    {
        return $this->given_names;
    }

    /**
     * Set the value of given_names
     *
     * @param  string  $given_names
     *
     * @return  self
     */ 
    public function setGivenNames(string $given_names)
    {
        $this->given_names = $given_names;

        return $this;
    }
}
