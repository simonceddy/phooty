<?php
namespace Phooty\Actions\PossibilityTrees;

use Phooty\Contracts\Actions\PossibilityTree;

class FreeKick implements PossibilityTree
{
    public function possibilities(): array
    {
        return [];
    }
}
