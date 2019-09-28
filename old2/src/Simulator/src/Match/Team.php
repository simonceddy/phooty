<?php
namespace Phooty\Simulator\Match;

use Phooty\Contracts\Simulator\Team as TeamContract;

class Team implements TeamContract
{
    protected $city;

    protected $name;

    protected $shorthand;

    public function __construct(array $data)
    {
        $this->city = $data['city'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->shorthand = $data['short'] ?? $data['shorthand'] ?? '';
    }

    public function name()
    {
        return $this->name;
    }

    public function city()
    {
        return $this->city;
    }

    public function short()
    {
        return $this->shorthand;
    }
}
