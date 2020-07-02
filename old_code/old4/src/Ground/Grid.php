<?php
namespace Phooty\Ground;

use Ds\Set;
use Phooty\Support\Traits\IsSerializable;

// TODO lazy load rows/cells
class Grid implements \ArrayAccess, \JsonSerializable
{
    use IsSerializable;

    protected int $length;

    protected int $width;

    protected Set $rows;

    /**
     * Construct a new Grid object
     *
     * @param int $length The number of cells per column
     * @param int $width The number of cells per row
     * @param array $options An array of cell options // TODO
     */
    public function __construct($length = 120, $width = 90, $options = [])
    {
        // TODO options for cells etc

        $this->length = $length;

        $this->width = $width;

        $this->prepareGrid();
    }

    private function prepareGrid()
    {
        $this->rows = new Set(
            (new RowFactory())->make($this->length, $this->width)
        );
    }

    public function width()
    {
        return $this->width;
    }

    public function length()
    {
        return $this->length;
    }

    public function unwrapSet()
    {
        return $this->rows;
    }

    public function offsetSet($offset, $value)
    {
        $this->rows[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->rows[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->rows[$offset];
    }

    public function offsetUnset($offset)
    {
        unset($this->rows[$offset]);
    }

    public function toArray()
    {
        return [
            'grid' => $this->rows,
            'length' => $this->length,
            'width' => $this->width
        ];
    }
}
