<?php
namespace Phooty\Crawler;

use Phooty\Support\ServiceProvider;
use Phooty\Support\TeamResolver;
use Phooty\Crawler\Crawler\SeasonPlayerTotals;
use Phooty\Crawler\Mappings\SeasonPlayerTotalsMapping;

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

        $this->app->bind(SeasonPlayerTotals::class, function () {
            return new SeasonPlayerTotals(
                $this->app,
                $this->app->make(SeasonPlayerTotalsMapping::class)
            );
        });
    }
}
