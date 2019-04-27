<?php
namespace Phooty\Crawler\Processor\Crawler;

use Symfony\Component\DomCrawler\Crawler;
use Phooty\Crawler\Contract\CrawlerProcessor;

class GetSeasonFromCrawler implements CrawlerProcessor
{
    public function process(Crawler $crawler)
    {
        $title = $crawler->filter('title')->first()->text();
        return (int) preg_replace('/\D/', '', $title);
    }
}
