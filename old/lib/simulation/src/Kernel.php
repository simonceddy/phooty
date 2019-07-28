<?php
namespace Phooty\Simulation;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Container\Container as IlluminateContainer;
use Phooty\Config\BootstrapConfig;
use Phooty\Simulation\Support\Traits\AppAware;
use Phooty\Simulation\Tilemap\Tilemap;
use Phooty\Simulation\Tilemap\PendingMap;
use Phooty\Simulation\Match\MatchContainer;
use Phooty\Simulation\Core\MatchSimulator;
use Phooty\Simulation\Support\MatchBuilder;

class Kernel
{
    use AppAware;

    /**
     * The Config instance
     *
     * @var Config
     */
    protected $config;

    /**
     * The MatchSimulator instance
     *
     * @var MatchSimulator
     */
    protected $sim;

    private static $cn_aliases = [
        'Phooty' => Kernel::class,
        'PhootyGround' => \Phooty\Simulation\Tilemap\Ground::class
    ];

    private static $aliased = false;

    public function __construct(
        Container $container = null,
        $config = null
    ) {
        $this->app = $container ?? new IlluminateContainer;
        
        $this->initConfig($config);
        
        if ($this->config->get('settings.debug')) {
            $this->registerDevBindings();
        }

        $this->registerBindings();

    }

    private function initConfig($config = null)
    {
        // todo: check paths
        if (is_array($config) || null === $config) {

            $config = (new BootstrapConfig())->bootstrap([
                dirname(__DIR__) . '/config'
            ], $config);

        } elseif (!$config instanceof Config) {

            throw new \InvalidArgumentException(
                "Invalid configuration argument"
            );

        }

        $this->config = $config;
        
        $this->app->instance(Config::class, $this->config);
    }

    private function registerDevBindings()
    {
        $this->app->bind(\Faker\Generator::class, function () {
            return \Faker\Factory::create();
        });
    }

    private function registerBindings()
    {
        if (!$this->app->has(Container::class)) {
            $this->app->singleton(Container::class, function () {
                return $this->app;
            });
        }

        $this->app->singleton(Support\Positions::class, function () {
            $positions = $this->config->get('data.positions');
            return new Support\Positions($positions);
        });

        $this->app->singleton(Emitter::class);
        
        $this->app->singleton(Support\Timer::class, function () {
            return new Support\Timer(
                $this->config->get('settings.quarter_length'),
                $this->app->make(Emitter::class)
            );
        });

        $this->app->instance(static::class, $this);

        $this->app->singleton(MatchSimulator::class);
    }

    protected function registerPendingTilemap(PendingMap $ground)
    {
        $this->app->singleton(Tilemap::class, function () use ($ground) {
            return $ground->create($this->app);
        });
    }

    protected function getSimulator(array $settings = []): MatchSimulator
    {
        isset($this->sim) ?: $this->sim = $this->app->make(
            MatchSimulator::class
        );

        return $this->sim;
    }

    public static function loadClassAliases()
    {
        if (!self::$aliased) {
            foreach (self::$cn_aliases as $alias => $cn) {
                class_exists($alias) ?: class_alias($cn, $alias);
            }
            self::$aliased = true;
        }
    }

    /**
     * Builds a Simulator instance.
     * 
     * This method will also create the MatchContainer instance.
     * 
     * @todo Improve creating a match
     *
     * @param callable $closure
     * @return MatchSimulator
     */
    public function makeSim(callable $closure)
    {
        $match = $this->app->make(Support\MatchBuilder::class);

        call_user_func($closure, $match);

        $this->app->instance(MatchContainer::class, $match->create());

        return $this->getSimulator();
    }

    /**
     * Create a MatchSimulator from an existing MatchBuilder.
     *
     * @param MatchBuilder $match
     * @return MatchSimulator
     * 
     * @throws Exception thrown if the match is invalid
     */
    public function build(MatchBuilder $match)
    {
        if (!$match->isValid()) {
            throw new \Exception(
                "Invalid match!"
            );
        }

        $this->app->instance(MatchContainer::class, $match->create());

        return $this->getSimulator();
    }
}
