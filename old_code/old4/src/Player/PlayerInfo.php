<?php
namespace Phooty\Player;

class PlayerInfo
{
    private string $givenNames;
    
    private string $surname;
    
    private int $number;

    public function __construct(
        string $givenNames,
        string $surname,
        int $number
    )
    {
        $this->givenNames = $givenNames;
        $this->surname = $surname;
        $this->number = $number;
    }

    /**
     * Get the value of number
     */ 
    public function number()
    {
        return $this->number;
    }

    /**
     * Get the value of surname
     */ 
    public function surname()
    {
        return $this->surname;
    }

    /**
     * Get the value of givenNames
     */ 
    public function givenNames()
    {
        return $this->givenNames;
    }

    public function fullName(bool $asArray = false)
    {
        # code...
        if ($asArray) {
            return [$this->givenNames, $this->surname];
        }
        return $this->givenNames . ' ' . $this->surname;
    }
}
