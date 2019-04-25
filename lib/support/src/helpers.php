<?php
if (!function_exists('phooty')) {
    function phooty(array $options = [])
    {
        return new Phooty\Foundation\Application($options);
    }
}