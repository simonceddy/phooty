<?php
namespace Phooty\Testing\Support;

use Faker\{
    Factory,
    Generator
};
use Phooty\Testing\{
    PlayerFactory,
    TeamFactory
};
use Pimple\{
    Container,
    ServiceProviderInterface
};

class TestingProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app[Generator::class] = function () {
            return Factory::create();
        };

        $app[PlayerFactory::class] = function (Container $app) {
            return new PlayerFactory($app[Generator::class]);
        };

        $app[TeamFactory::class] = function (Container $app) {
            return new TeamFactory($app[Generator::class]);
        };
    }
}
