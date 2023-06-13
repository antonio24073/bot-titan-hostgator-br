<?php

namespace Bot\Titan\Filter;

use Symfony\Component\DomCrawler\Crawler;

abstract class AbstractHtmlFilter
{
    protected $crawler;
    
    protected $content;
    
    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->content;
    }

    public function __construct($content)
    {
        $this->content = $content;
        $this->crawler = new Crawler();
        $this->crawler->addHtmlContent($this->content, 'UTF-8');
    }
}