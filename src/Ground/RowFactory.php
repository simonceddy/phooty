<?php
namespace Phooty\Ground;

use Ds\Set;

class RowFactory
{
    protected function createCells(int $amount, int $row)
    {
        $cells = [];

        for ($i = 0; $i < $amount; $i++) {
            $cells[] = new Cell($row, $i);
        }

        return $cells;
    }

    public function make(int $amount, int $cellsPerRow = 64)
    {
        // TODO: write logic here
        $rows = [];

        for ($i = 0; $i < $amount; $i++) {
            $rows[] = new Set($this->createCells($cellsPerRow, $i));
        }

        return $rows;
    }
}
