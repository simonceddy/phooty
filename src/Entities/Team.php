<?php
namespace Phooty\Entities;

use Phooty\Entities\Support\HasNicknames;

class Team
{
    use HasNicknames;

    protected string $name;

    protected string $city;
    
    public function __construct(
        string $city,
        string $name,
        array $nicknames = []
    ) {
        $this->city = $city;
        $this->name = $name;

        empty($nicknames) ?: $this->nicknames = $nicknames;
    }

    public function city()
    {
        return $this->city;
    }

    public function name()
    {
        return $this->name;
    }

    public function __get(string $name)
    {
        switch ($name) {
            case 'city':
                return $this->city;
            case 'name':
                return $this->name;
            case 'nicknames':
                return $this->nicknames();
        }

        throw new \Exception(
            'Unknown property: ' . $name
        );
    }
}
