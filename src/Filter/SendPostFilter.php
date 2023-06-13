<?php
namespace Bot\Titan\Filter;

class SendPostFilter extends AbstractJsonFilter
{
    public function json()
    {
        return $this->object;
    }
    public function mid()
    {
        return $this->object->mid;
    }
    public function mhid()
    {
        return $this->object->mhid;
    }
}