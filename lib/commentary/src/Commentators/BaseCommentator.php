<?php
namespace Phooty\Commentary\Commentators;

use Phooty\Commentary\Commentator;

abstract class BaseCommentator implements Commentator
{
    protected static $names;

    public static function names(): array
    {
        return is_array(self::$names) ? self::$names : [];
    }
}
