<?php
namespace Phooty\Crawler;

use Phooty\Support\ServiceProvider;
use Phooty\Crawler\Support\TeamResolver;

class CrawlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TeamResolver::class, function () {
            $config = $this->app->make('config');
            return new TeamResolver(
                $config->get('phooty.crawler.teams'),
                $config->get('phooty.crawler.aliases')
            );
        });
    }
}
