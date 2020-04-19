<?php

namespace Phooty\Simulator\Entities;

class Player
{
    protected $number;

    protected $surname;

    protected $firstNames;

    protected $nicknames;

    public function __construct(
        int $number,
        string $surname,
        string $firstNames,
        array $options = []
    ) {
        $this->number = $number;

        $this->surname = $surname;

        $this->firstNames = $firstNames;

        !isset($options['nicknames']) ?: $this->nicknames = $options['nicknames'];
    }

    public function surname()
    {
        return $this->surname;
    }

    public function number()
    {
        return $this->number;
    }

    public function nicknames()
    {
        return $this->nicknames;
    }
}
