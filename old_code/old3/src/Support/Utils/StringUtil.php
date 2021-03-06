<?php
namespace Phooty\Support\Utils;

use Assert\Assertion;

class StringUtil
{
    public static function baseClassName($target)
    {
        // TODO fix validation
        if (!is_string($target)) {
            Assertion::isObject(
                $target,
                'Target is not an object or the class was not found.'
            );
            $target = get_class($target);
        }

        return substr($target, (strrpos($target, '\\') + 1));
    }
}
