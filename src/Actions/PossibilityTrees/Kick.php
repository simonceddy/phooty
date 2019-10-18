<?php
namespace Phooty\Actions\PossibilityTrees;

use Phooty\Contracts\Actions\PossibilityTree;

class Kick implements PossibilityTree
{
    public function possibilities(): array
    {
        return [];
    }
}
