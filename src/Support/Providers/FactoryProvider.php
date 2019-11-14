<?php
namespace Phooty\Support\Providers;

use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use Phooty\Contracts\App\Provider;
use Phooty\Support\Factories\PlayerFactory;
use Phooty\Support\Faker\NameUtil;
use Pimple\Container;

class FactoryProvider implements Provider
{
    public function register(Container $c)
    {
        $c['faker'] = function () {
            return FakerFactory::create();
        };

        $c[FakerGenerator::class] = $c['faker'];
        
        $this->registerUtils($c);
        
        $this->registerFactories($c);
    }

    protected function registerUtils(Container $c)
    {
        $c[NameUtil::class] = function ($c) {
            return new NameUtil($c['faker']);
        };
    }

    protected function registerFactories(Container $c)
    {
        $c['factory.player'] = function ($c) {
            return new PlayerFactory($c[NameUtil::class], $c['faker']);
        };

        $c[PlayerFactory::class] = $c['factory.player'];
    }
}
