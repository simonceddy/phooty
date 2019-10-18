<?php
namespace Phooty\Actions\PossibilityTrees;

use Phooty\Contracts\Actions\PossibilityTree;

class Smother implements PossibilityTree
{
    public function possibilities(): array
    {
        return [];
    }
}
