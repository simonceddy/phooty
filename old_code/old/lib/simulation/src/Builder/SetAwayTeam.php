<?php
namespace Phooty\Simulation\Builder;

class SetAwayTeam
{
    /**
     * The MatchBuilder instance
     *
     * @var MatchBuilder
     */
    protected $builder;

    public function __construct(MatchBuilder $builder)
    {
        $this->builder;
    }

    public function vs($awayTeam)
    {
        return $this->builder->setAwayTeam($awayTeam);
    }
}
