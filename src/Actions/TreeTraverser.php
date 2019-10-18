<?php
namespace Phooty\Actions;

use Assert\Assertion;
use Phooty\Support\Utils\StringUtil;

class TreeTraverser
{
    protected const POSS_TREE_NS = '\\Phooty\\Actions\\PossibilityTrees\\';

    public function resolveTreeFor($action)
    {
        $basename = StringUtil::baseClassName($action);
        Assertion::classExists($cn = static::POSS_TREE_NS . $basename);

        return new $cn;
    }
}
