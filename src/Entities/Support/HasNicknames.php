<?php
namespace Phooty\Entities\Support;

trait HasNicknames
{
    protected array $nicknames;

    /**
     * Get an array containing the entity's nicknames. Returns null if no
     * nicknames are set.
     *
     * @return string[]|null
     */
    public function nicknames()
    {
        return isset($this->nicknames) ? $this->nicknames : null;
    }
}
