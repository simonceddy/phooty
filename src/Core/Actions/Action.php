<?php
namespace Phooty\Core\Actions;

use Phooty\Contracts\Actions\Type;

class Action implements Type
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
