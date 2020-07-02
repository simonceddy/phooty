<?php
namespace Phooty\Ground;

use Ds\Set;
use Phooty\Support\{
    Traits\HasCoordinates,
    Traits\IsSerializable
};

class Cell implements \JsonSerializable
{
    use HasCoordinates;
    use IsSerializable;

    private $contents;

    public function __construct(int $y, int $x, array $options = [])
    {
        $this->y = $y;

        $this->x = $x;

        $this->initContents(
            isset($options['contents']) ? $options['contents'] : []
        );
    }

    private function initContents($contents = [])
    {
        $this->contents = new Set($contents);
    }

    public function contents()
    {
        return $this->contents;
    }

    public function toArray()
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
            // TODO contents
        ];
    }
}
