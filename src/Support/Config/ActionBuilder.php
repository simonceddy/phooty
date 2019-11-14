<?php
namespace Phooty\Support\Config;

use Phooty\Core\Action;

class ActionBuilder
{
    protected $type;

    public function __construct(string $type)
    {
        $this->type = new Action($type);
    }

    public static function make(string $type)
    {
        $action = new self($type);

        return $action;
    }
}
