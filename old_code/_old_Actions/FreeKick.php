<?php
namespace Phooty\Actions;

use Phooty\Contracts\Action;

class FreeKick implements Action
{
    public function possibilities(): array
    {
        return [
            Kick::class,
            Handball::class
        ];
    }
}
