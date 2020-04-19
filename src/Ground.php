<?php
namespace Phooty;

use Phooty\Ground\Grid;

/**
 * The Phooty Ground represents the virtual playing field.
 * 
 * Entity positions are recorded in a grid.
 * 
 * Entities can be moved around the grid as required.
 * 
 * Specific cells in the grid can have special meaning (e.g. out of bounds).
 */
class Ground
{
    protected Grid $grid;

    public function __construct(Grid $grid = null)
    {
        $this->grid = $grid ?? new Grid();
    }

    public function grid()
    {
        // TODO: write logic here
        return $this->grid;
    }


}
