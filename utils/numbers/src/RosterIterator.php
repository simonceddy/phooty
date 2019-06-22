<?php
namespace Phooty\Numbers;

class RosterIterator
{
    protected $results = [];
    
    public function process($rosters, callable $callback)
    {
        if (!is_iterable($rosters)) {
            throw new \InvalidArgumentException("Invalid rosters!");
        }

        foreach ($rosters as $roster) {
            $res = call_user_func($callback, $roster);
            null === $res ?: $this->results[] = $res;
        }

        return $this;
    }

    public function results()
    {
        return $this->results;
    }
}
