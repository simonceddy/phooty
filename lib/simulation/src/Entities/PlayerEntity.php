<?php
namespace Phooty\Simulation\Entities;

class PlayerEntity extends SimulationEntity
{
    protected $number;

    protected $surname;

    protected $given_names;

    /**
     * A nickname or array of nicknames
     *
     * @var string|string[]
     */
    protected $nicknames;
}
