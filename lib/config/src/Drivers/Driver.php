<?php
namespace Phooty\Config\Drivers;

abstract class Driver
{
    abstract public function load($resource);
}