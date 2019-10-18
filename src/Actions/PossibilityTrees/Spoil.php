<?php
namespace Phooty\Actions\PossibilityTrees;

use Phooty\Contracts\Actions\PossibilityTree;

class Spoil implements PossibilityTree
{
    public function possibilities(): array
    {
        return [];
    }
}
