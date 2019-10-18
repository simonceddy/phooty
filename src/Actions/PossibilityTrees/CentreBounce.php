<?php
namespace Phooty\Actions\PossibilityTrees;

use Phooty\Actions\Types;
use Phooty\Contracts\Actions\PossibilityTree;

class CentreBounce implements PossibilityTree
{
    public function possibilities(): array
    {
        return [
            Types\RecalledBounce::class,
            Types\Hitout::class,
            Types\FreeKick::class,
        ];
    }
}
