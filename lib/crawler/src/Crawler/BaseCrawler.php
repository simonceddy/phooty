<?php
namespace Phooty\Crawler\Crawler;

use Phooty\Crawler\Mappings\Mapping;
use Illuminate\Contracts\Container\Container;
use Phooty\Crawler\Results;

abstract class BaseCrawler implements Crawler
{
    /**
     * The result data
     *
     * @var Results
     */
    protected $results;

    /**
     * The Column Mappings
     *
     * @var Mapping
     */
    protected $mappings;

    /**
     * The Container instance
     *
     * @var Container
     */
    protected $container;
    
    /**
     * Crawls through the response html and returns an array of results.
     *
     * @param string $html
     * @return Results
     */
    abstract public function crawl(string $html): Results;

    public function __construct(Container $container, Mapping $mappings)
    {
        $this->container = $container;
        $this->mappings = $mappings;
    }

    public function factory(string $factory = null)
    {
        return $this->container->make("factory.{$factory}");
    }

    public function result(): Results
    {
        isset($this->results) ?: $this->results = $this->container->make(Results::class);
        return $this->results;
    }
}
