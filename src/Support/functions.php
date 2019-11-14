<?php
if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        return getenv($key) ?? $default;
    }
}
