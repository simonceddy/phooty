<?php
namespace Phooty\Simulation;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Container\Container as IlluminateContainer;
use Phooty\Config\BootstrapConfig;
use Phooty\Simulation\Support\Traits\AppAware;
use Phooty\Simulation\Tilemap\Tilemap;
use Phooty\Simulation\Tilemap\Ground;
use Phooty\Simulation\Tilemap\PendingMap;

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

    private function registerBindings()
    {
        if (!$this->app->has(Container::class)) {
            $this->app->singleton(Container::class, function () {
                return $this->app;
            });
        }

        $this->app->singleton(Dispatcher::class, function () {
            return (new Bootstrap\BootstrapDispatcher)->bootstrap(
                new Dispatcher($this->app)
            );
        });
        
        $this->app->singleton(Support\Timer::class, function () {
            return new Support\Timer(
                $this->config->get('sim.period_length'),
                $this->app->make(Dispatcher::class)
            );
        });

        $this->app->instance(static::class, $this);

        $this->app->singleton(MatchSimulator::class);

        /* $this->app->singleton(Tilemap::class, function (int $w, int $l) {
            return new Tilemap($this->app, $w, $l);
        }); */
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
     * @param callable $closure
     * @return MatchSimulator
     */
    public function makeSim(callable $closure)
    {
        $builder = $this->app->make(Support\MatchBuilder::class);

        call_user_func($closure, $builder);

        $this->app->instance(MatchContainer::class, $builder->create());

        return $this->getSimulator();
    }
}
