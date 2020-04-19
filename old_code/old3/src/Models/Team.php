<?php
namespace Phooty\Models;

class Team
{
    /**
     * The Team's name
     *
     * @var string
     */
    protected $name;

    /**
     * The Team's city or location
     *
     * @var string
     */
    protected $city;

    public function __construct(string $city, string $name)
    {
        // TODO validate city and name
        $this->city = $city;
        $this->name = $name;
    }



    /**
     * Get the Team's name
     *
     * @return  string
     */ 
    public function name()
    {
        return $this->name;
    }

    /**
     * Get the Team's city or location
     *
     * @return  string
     */ 
    public function city()
    {
        return $this->city;
    }
}
