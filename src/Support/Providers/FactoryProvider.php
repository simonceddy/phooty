<?php
namespace Phooty\Support\Providers;

use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use Phooty\Contracts\Core\Provider;
use Phooty\Factories\PlayerFactory;
use Phooty\Support\Faker\NameUtil;
use Pimple\Container;

class FactoryProvider implements Provider
{
    public function register(Container $c)
    {
        $c[FakerGenerator::class] = function () {
            return FakerFactory::create();
        };

        $c[PlayerFactory::class] = function () {
            return new PlayerFactory();
        };

        $this->registerUtils($c);
    }

    protected function registerUtils(Container $c)
    {
        $c[NameUtil::class] = function ($c) {
            return new NameUtil($c[FakerGenerator::class]);
        };
    }
}
