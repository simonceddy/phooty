<?php

namespace Phooty\Support;

class Text
{
    private string $string;

    public function __construct(string $text = '')
    {
        $this->string = $text;
    }

    public function trimLastDot()
    {
        return pathinfo($this->string, PATHINFO_FILENAME);
    }

    public function __toString()
    {
        return $this->string;
    }
}
