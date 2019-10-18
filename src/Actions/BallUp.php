<?php
namespace Phooty\Actions;

use Phooty\Contracts\Action;

class BallUp implements Action
{
    public function possibilities(): array
    {
        return [
            Hitout::class,
            FreeKick::class
        ];
    }
}
