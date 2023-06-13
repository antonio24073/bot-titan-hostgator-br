<?php
namespace Bot\Titan\Filter;

class FilesPostFilter extends AbstractJsonFilter
{
    public function put_url()
    {
        return $this->object->url;
    }
    public function id()
    {
        return $this->object->id;
    }
}