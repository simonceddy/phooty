<?php
namespace Phooty\Crawler\Crawler;

use Phooty\Crawler\Mappings\Mapping;
use Illuminate\Contracts\Container\Container;

abstract class BaseCrawler implements Crawler
{
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
     * @return array
     */
    abstract public function crawl(string $html);

    public function __construct(Container $container, Mapping $mappings)
    {
        $this->container = $container;
        $this->mappings = $mappings;
    }

    public function factory(string $factory = null)
    {
        return $this->container->make("factory.{$factory}");
    }
}
