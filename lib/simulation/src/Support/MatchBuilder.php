<?php
namespace Phooty\Simulation\Support;

use Illuminate\Contracts\Container\Container;
use Phooty\Simulation\MatchContainer;
use Phooty\Simulation\Support\Traits\AppAware;
use Phooty\Simulation\Tilemap\Tilemap;
use Phooty\Simulation\Tilemap\PendingMap;
use Phooty\Simulation\Support\Timer;

class MatchBuilder
{
    use AppAware;

    /**
     * The Home team
     *
     * @var [type]
     */
    protected $homeTeam;

    /**
     * The Away team
     *
     * @var [type]
     */
    protected $awayTeam;

    /**
     * The Timer instance
     *
     * @var Timer
     */
    protected $timer;

    /**
     * The Tilemap instance for the specified ground
     *
     * @var Tilemap
     */
    protected $ground;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    /**
     * Get the Away team
     *
     * @return  [type]
     */ 
    public function getAwayTeam()
    {
        return $this->awayTeam;
    }

    /**
     * Set the Away team
     *
     * @param  [type]  $awayTeam  The Away team
     *
     * @return  self
     */ 
    public function setAwayTeam($awayTeam)
    {
        $this->awayTeam = $awayTeam;

        return $this;
    }

    /**
     * Get the Tilemap instance for the specified ground
     *
     * @return  Tilemap
     */ 
    public function getGround()
    {
        return $this->ground;
    }

    /**
     * Set the Tilemap instance for the specified ground
     *
     * @param  mixed  $ground
     *
     * @return  self
     */ 
    public function setGround($ground)
    {
        if ($ground instanceof PendingMap) {
            $ground = $ground->create($this->app);
        }

        $this->ground = SetGround::resolve([$ground]);

        return $this;
    }

    /**
     * Get the Home team
     *
     * @return  [type]
     */ 
    public function getHomeTeam()
    {
        return $this->homeTeam;
    }

    /**
     * Set the Home team
     *
     * @param  [type]  $homeTeam  The Home team
     *
     * @return  self
     */ 
    public function setHomeTeam($homeTeam)
    {
        $this->homeTeam = $homeTeam;

        return $this;
    }

    public function create(array $options = [])
    {
        if (!$this->isValid()) {
            throw new \LogicException(
                "Match not ready to be created!"
            );
        }

        // todo handle options
        
        return new MatchContainer($this);
    }

    /**
     * Get the Timer instance
     *
     * @return  Timer
     */ 
    public function getTimer()
    {
        isset($this->timer) ?: $this->timer = $this->app->make(Timer::class);
        return $this->timer;
    }

    /**
     * Is the Match able to be created?
     *
     * @return boolean
     */
    public function isValid()
    {
        return isset($this->ground, $this->homeTeam, $this->awayTeam);
    }
}
