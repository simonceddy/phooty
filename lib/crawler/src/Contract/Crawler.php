<?php
namespace Phooty\Crawler\Contract;

interface Crawler
{
    public function crawl(string $html);
}
