<?php
namespace Phooty\Core;

use Phooty\Contracts\App\Provider;
use Phooty\Core\Outcomes\OutcomeMap;
use Pimple\Container;

class ActionOutcomeProvider implements Provider
{
    public function register(Container $c)
    {
        if (isset($c['config']) && is_array($c['config']['core.outcomes'])) {
            $c['outcomes'] = function ($c) {
                return new OutcomeMap($c['config']['core.outcomes']);
            };
        }

        // dd($c->offsetExists('config'));
    }
}
