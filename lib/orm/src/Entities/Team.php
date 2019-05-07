<?php
namespace Phooty\Orm\Entities;

/**
 * @Entity @Table(name="teams")
 */
class Team
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
    protected $city;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $short;

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
     * Get the Team's id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of city
     *
     * @return  string
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @param  string  $city
     *
     * @return  self
     */ 
    public function setCity(string $city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of short
     *
     * @return  string
     */ 
    public function getShort()
    {
        return $this->short;
    }

    /**
     * Set the value of short
     *
     * @param  string  $short
     *
     * @return  self
     */ 
    public function setShort(string $short)
    {
        $this->short = $short;

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
