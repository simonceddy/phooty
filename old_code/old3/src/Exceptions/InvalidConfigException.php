<?php
namespace Phooty\Exceptions;

class InvalidConfigException extends PhootyException
{
    public function __construct(
        string $message = "Invalid configuration!",
        int $code = 0,
        \Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
