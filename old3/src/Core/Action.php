<?php
namespace Phooty\Core;

use Phooty\Contracts\Actions\Typed;

class Action implements Typed
{
    /**
     * The action type
     *
     * @var string
     */
    protected $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function type()
    {
        return $this->type;
    }

    public function __toString()
    {
        return $this->type;
    }
}
