<?php
namespace Phooty\Core\Actions;

use Phooty\Contracts\Actions\Type;

class GetOutcome
{
    protected $outcomeMap;

    public function __construct(array $outcomeMap)
    {
        $this->outcomeMap = $outcomeMap;
    }

    public function from(Type $action)
    {
        # code...
    }
}
