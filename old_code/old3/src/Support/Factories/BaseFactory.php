<?php
namespace Phooty\Support\Factories;

use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;
use Phooty\Contracts\Factory as PhootyFactory;
use Phooty\Support\Traits\FakerAware;
use Psr\Container\ContainerInterface;

abstract class BaseFactory implements PhootyFactory
{
    use FakerAware;

    /**
     * Container instance
     *
     * @var ContainerInterface
     */
    protected $container;

    abstract public function create(array $data = [], array $options = []);

    public function __construct(FakerGenerator $faker = null) {
        $this->faker = $faker ?? FakerFactory::create();
    }
}
