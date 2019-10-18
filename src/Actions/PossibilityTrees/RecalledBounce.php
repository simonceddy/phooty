<?php
namespace Phooty\Actions\PossibilityTrees;

use Phooty\Actions\Types;
use Phooty\Contracts\Actions\PossibilityTree;

class RecalledBounce implements PossibilityTree
{
    public function possibilities(): array
    {
        return [
            Types\BallUp::class,
        ];
    }
}
