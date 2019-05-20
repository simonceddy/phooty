<?php
namespace Phooty\Simulation\Support;

class Timer
{
    /**
     * The total time elapsed in ms.
     *
     * @var int
     */
    private $total = 0;

    /**
     * The time elapsed for the current period.
     *
     * @var int
     */
    private $current = 0;

    /**
     * The number of times the current timer has been reset.
     *
     * @var int
     */
    private $resets = 0;

    public function tick(int $ms = 1)
    {
        if (1 > $ms) {
            throw new \InvalidArgumentException(
                "Ticks cannot be less than 1 millisecond."
            );
        }

        $this->current += $ms;
        $this->total += $ms;

        return $this;
    }

    public function reset()
    {
        $this->current = 0;
        $this->resets++;
        return $this;
    }

    /**
     * Get the total time elapsed in ms.
     *
     * @return  int
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the time elapsed for the current period.
     *
     * @return  int
     */ 
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * Get the number of times the current timer has been reset.
     *
     * @return  int
     */ 
    public function getResets()
    {
        return $this->resets;
    }
}
