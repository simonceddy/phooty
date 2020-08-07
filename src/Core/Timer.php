<?php
namespace Phooty\Core;

class Timer
{
    private int $current = 0;

    private array $callbacks = [];

    public function current()
    {
        return $this->current;
    }

    protected function runCallbacks(array $callbacks)
    {
        // dd($callbacks);
        foreach ($callbacks as $callable) {
            call_user_func($callable, $this);
        }
    }

    public function tick(int $ms = 1)
    {
        $old = $this->current;
        $this->current += $ms;

        if (!empty($this->callbacks)) {
            // TODO run callbacks
            $callbacksTimes = array_filter(
                $this->callbacks, 
                fn($key) => $key >= $old && $key <= $this->current,
                ARRAY_FILTER_USE_KEY
            );

            if (!empty($callbacksTimes)) {
                foreach ($callbacksTimes as $callbacks) {
                    $this->runCallbacks($callbacks);
                }
            }
        }

        return $this;
    }

    public function reset()
    {
        $this->current = 0;
        return $this;
    }

    public function __toString()
    {
        return (string) $this->current;
    }

    public function runAt(int $amount, array $callbacks)
    {
        if (!isset($this->callbacks[$amount])) {
            $this->callbacks[$amount] = [];
        }

        $this->callbacks[$amount] = array_merge(
            $callbacks,
            $this->callbacks[$amount]
        );

        return $this;
    }
}
