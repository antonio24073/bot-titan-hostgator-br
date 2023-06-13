<?php

namespace Bot\Titan\Filter;


use Bot\Titan\Utils\Convert;

abstract class AbstractJsonFilter
{
    protected $object;

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }
    
    public function __construct($content)
    {        
        $this->object = Convert::recursive_json_to_object($content);
    }
}