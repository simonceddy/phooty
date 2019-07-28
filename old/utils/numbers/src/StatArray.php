<?php
namespace Phooty\Numbers;

class StatArray extends \ArrayObject
{
    public static $stats = [
        'games' => 0,
        'kicks' => 0,
        'marks' => 0,
        'handballs' => 0,
        'disposals' => 0,
        'goals' => 0,
        'behinds' => 0,
        'hitouts' => 0,
        'tackles' => 0,
        'rebound_50' => 0,
        'inside_50' => 0,
        'clearances' => 0,
        'clangers' => 0,
        'frees_for' => 0,
        'frees_against' => 0,
        'brownlow_votes' => 0,
        'contested_possessions' => 0,
        'uncontested_possessions' => 0,
        'contested_marks' => 0,
        'marks_inside_50' => 0,
        'one_percenters' => 0,
        'bounces' => 0,
        'goal_assists' => 0,
        'time_on_ground' => 0,
    ];

    public function __construct(array $stats = [])
    {
        parent::__construct($this->initStats($stats), static::ARRAY_AS_PROPS);
    }

    private function initStats(array $stats)
    {
        if (empty($stats)) {
            return static::$stats;
        }

        return array_merge(static::$stats, $stats);
    }
}
