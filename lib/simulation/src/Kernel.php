<?php
namespace Phooty\Simulation;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Container\Container as IlluminateContainer;
use Phooty\Config\BootstrapConfig;
use Phooty\Simulation\Support\Traits\AppAware;

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

    /**
     * Has the Kernel run bootstrapping processes
     *
     * @var boolean
     */
    private $bootstrapped = false;

    public function __construct(
        Container $container = null,
        Config $config = null
    ) {
        $this->app = $container ?? new IlluminateContainer;
        
        $this->initConfig($config);

        $this->registerEventDispatcher();

        $this->registerBindings();

    }

    private function initConfig(Config $config = null)
    {
        // todo: check paths
        if (null === $config) {
            $config = (new BootstrapConfig())->bootstrap([
                dirname(__DIR__) . '/config'
            ]);
        }
        $this->config = $config;
        
        $this->app->instance(Config::class, $this->config);
    }

    private function registerEventDispatcher()
    {
    }

    private function registerBindings()
    {
        if (!$this->app->has(Container::class)) {
            $this->app->singleton(Container::class, function () {
                return $this->app;
            });
        }

        $this->app->singleton(Dispatcher::class);
        
        $this->app->singleton(Support\Timer::class, function () {
            return new Support\Timer(
                $this->config->get('sim.period_length'),
                $this->app->make(Dispatcher::class)
            );
        });

        $this->app->instance(static::class, $this);

        $this->app->singleton(MatchSimulator::class);

    }

    public function simulate()
    {
        $this->isBootstrapped() ?: $this->bootstrap();

        return $this->simulator()->run();
    }

    public function simulator(): MatchSimulator
    {
        isset($this->sim) ?: $this->sim = $this->app->make(MatchSimulator::class);

        return $this->sim;
    }

    /**
     * Check if the Kernel has run bootstrapping processes
     *
     * @return  boolean
     */ 
    public function isBootstrapped()
    {
        return $this->bootstrapped;
    }

    /**
     * Runs the processes required before simulation.
     *
     * @param array $bootstrappers
     * @return self
     */
    public function bootstrap(array $bootstrappers = [])
    {
        $this->initSubscribers();
        $this->bootstrapped = true;
        return $this;
    }

    protected function initSubscribers()
    {
        $dispatcher = $this->app->make(Dispatcher::class);

        $dispatcher->addSubscriber(
            $this->app->make(Subscribers\MatchSubscriber::class)
        );        

        $dispatcher->addSubscriber(
            $this->app->make(Subscribers\TimerSubscriber::class)
        );


    }


}
