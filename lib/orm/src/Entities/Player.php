<?php
namespace Phooty\Orm\Entities;

/**
 * @Entity @Table(name="players")
 */
class Player
{
    /**
     * @var \Ramsey\Uuid\UuidInterface
     *
     * @Id
     * @Column(type="uuid", unique=true)
     * @GeneratedValue(strategy="CUSTOM")
     * @CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
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
     * Prior players with the same name
     *
     * @Column(type="integer")
     * @var int
     */
    protected $prior_players;

    /**
     * @Column(type="datetime")
     * @var DateTime
     */
    protected $created;

    public function __construct()
    {
        $this->created = new \DateTime();
    }
    
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

    /**
     * Get prior players with the same name
     *
     * @return  int
     */ 
    public function getPriorPlayers()
    {
        return $this->prior_players;
    }

    /**
     * Set prior players with the same name
     *
     * @param  int  $prior_players  Prior players with the same name
     *
     * @return  self
     */ 
    public function setPriorPlayers(int $prior_players)
    {
        $this->prior_players = $prior_players;

        return $this;
    }

    /**
     * Get the value of created
     *
     * @return  DateTime
     */ 
    public function getCreated()
    {
        return $this->created;
    }
}
