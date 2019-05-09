<?php
return [
    'commands' => [
        Phooty\Crawler\Console\CrawlSeason::class,
        Phooty\Crawler\Console\CrawlSeasonHtml::class,
        Phooty\Orm\Console\ListRoster::class,
        Phooty\Console\Commands\Orm\PlayerCommand::class,
    ]
];
