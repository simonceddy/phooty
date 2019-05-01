<?php
namespace Phooty\Crawler\Crawler;

use Phooty\Crawler\Mappings\Mapping;

abstract class BaseCrawler implements Crawler
{
    /**
     * The Column Mappings
     *
     * @var Mapping
     */
    protected $mappings;
    
    /**
     * Crawls through the response html and returns an array of results.
     *
     * @param string $html
     * @return array
     */
    abstract public function crawl(string $html);

    public function __construct(Mapping $mappings)
    {
        $this->mappings = $mappings;
    }
}
