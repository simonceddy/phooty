<?php
namespace Phooty\Crawler\Crawler;

use Phooty\Crawler\Contract\Crawler;
use Phooty\Crawler\Contract\DataMapping;

abstract class BaseCrawler implements Crawler
{
    /**
     * The Column Mappings
     *
     * @var \Phooty\Crawler\Contract\DataMapping
     */
    protected $mappings;
    
    /**
     * Crawls through the response html and returns an array of results.
     *
     * @param string $html
     * @return array
     */
    abstract public function crawl(string $html);

    public function __construct(DataMapping $mappings)
    {
        $this->mappings = $mappings;
    }
}
