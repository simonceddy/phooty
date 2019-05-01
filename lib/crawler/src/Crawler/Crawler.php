<?php
namespace Phooty\Crawler\Crawler;

interface Crawler
{
    public function crawl(string $html);
}
