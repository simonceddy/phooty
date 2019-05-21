<?php
namespace Phooty\Simulation\Generators;

class PassageGenerator
{
    public function generate()
    {
        for ($i = 0; $i < 100; $i++) {
            yield mt_rand(0, 199);
        }
    }
}
