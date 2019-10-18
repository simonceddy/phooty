<?php
namespace Phooty\Actions\PossibilityTrees;

use Phooty\Contracts\Actions\PossibilityTree;

class ThrowIn implements PossibilityTree
{
    public function possibilities(): array
    {
        return [];
    }
}
