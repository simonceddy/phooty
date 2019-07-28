<?php
use Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand;

return [

    /**
     * Register the application's console commands
     */
    'commands' => [
        Phooty\Crawler\Console\CrawlSeason::class,
        Phooty\Crawler\Console\CrawlSeasonHtml::class,
        Phooty\Orm\Console\ListRoster::class,
        Phooty\Orm\Console\FindPlayer::class,
        Phooty\Console\Commands\DrawSherrin::class,
        //Phooty\Console\Commands\RunCommand::class,
        Phooty\Console\Commands\InstallCommand::class,

        //CreateCommand::class ,
    ]
];
