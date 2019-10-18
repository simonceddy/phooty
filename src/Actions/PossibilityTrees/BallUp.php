<?php
namespace Phooty\Actions\PossibilityTrees;

use Phooty\Actions\Types;
use Phooty\Contracts\Actions\PossibilityTree;

class BallUp implements PossibilityTree
{
    public function possibilities(): array
    {
        return [
            Types\Hitout::class,
            Types\FreeKick::class
        ];
    }
}
