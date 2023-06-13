<?php
namespace Bot\Titan\Filter;

use Bot\Titan\Filter\AbstractHtmlFilter;

class CridFilter extends AbstractHtmlFilter
{
    public function crid(){
        return $this->crawler->filterXPath('//*[@id="crid"]')->text();
    }
}