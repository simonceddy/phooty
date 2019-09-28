<?php
namespace Phooty\Contracts;

interface Factory
{
    public function create(array $data = [], array $options = []);
}
