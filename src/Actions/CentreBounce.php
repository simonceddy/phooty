<?php
namespace Phooty\Actions;

use Phooty\Contracts\Action;

class CentreBounce implements Action
{
    public function possibilities(): array
    {
        return [
            RecalledBounce::class,
            Hitout::class,
            FreeKick::class,
        ];
    }
}
