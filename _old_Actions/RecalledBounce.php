<?php
namespace Phooty\Actions;

use Phooty\Contracts\Action;

class RecalledBounce implements Action
{
    public function possibilities(): array
    {
        return [
            BallUp::class,
        ];
    }
}
