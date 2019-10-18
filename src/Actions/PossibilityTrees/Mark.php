<?php
namespace Phooty\Actions\PossibilityTrees;

use Phooty\Contracts\Actions\PossibilityTree;

class Mark implements PossibilityTree
{
    public function possibilities(): array
    {
        return [];
    }
}
