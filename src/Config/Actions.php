<?php
namespace Phooty\Config;

use Phooty\Support\Types\UntouchableArray;

class Actions extends UntouchableArray
{
    public function __construct(array $types)
    {
        parent::__construct(array_combine($types, $types));
    }
}
