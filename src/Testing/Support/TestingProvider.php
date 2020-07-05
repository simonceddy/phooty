<?php
namespace Phooty\Testing\Support;

use Faker\Factory;
use Faker\Generator;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class TestingProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app[Generator::class] = function () {
            return Factory::create();
        };
    }
}
