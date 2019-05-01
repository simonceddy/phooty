<?php
namespace Phooty\Config\Drivers;

interface Driver
{
    public function load($resource);
}