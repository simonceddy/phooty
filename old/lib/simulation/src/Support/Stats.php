<?php
namespace Phooty\Simulation\Support;

class Stats
{
    protected static $stats = [
        'kicks',
        'handballs',
        'marks',
        'hitouts',
        'goals',
        'behinds',
        'tackles',
        'clearances',
        'clangers',
        'one_percenters',
        'bounces',
        'inside_50',
        'rebound_50',
    ];

    public static function all()
    {
        return self::$stats;
    }
}
