<?php

namespace spec\Phooty\Actions;

use Phooty\Actions\PossibilityTrees\BallUp as BallUpTree;
use Phooty\Actions\TreeTraverser;
use Phooty\Actions\Types\BallUp as BallUpType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TreeTraverserSpec extends ObjectBehavior
{
    function it_can_resolve_a_possibility_tree_for_an_action()
    {
        $this->resolveTreeFor(new BallUpType)->shouldBeAnInstanceOf(BallUpTree::class);
    }
}
