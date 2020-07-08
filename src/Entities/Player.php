<?php

namespace Phooty\Entities;

class Player
{
    protected PlayerInfo $info;

    protected PlayerRatings $ratings;

    public function __construct(
        PlayerInfo $info,
        PlayerRatings $ratings
    ) {
        $this->info = $info;
        $this->ratings = $ratings;
    }

    public function info()
    {
        return $this->info;
    }

    public function ratings()
    {
        return $this->ratings;
    }
}
