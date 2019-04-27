<?php
namespace Phooty\Crawler\Contract;

use Symfony\Component\DomCrawler\Crawler;

interface CrawlerProcessor
{
    public function process(Crawler $crawler);
}
