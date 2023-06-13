<?php
namespace Bot\Titan\Filter;

class UpsertPostFilter extends AbstractJsonFilter
{
    public function draft_mid()
    {
        return $this->object->mid;
    }
    public function thread_id()
    {
        return $this->object->thread_id;
    }
    public function req_id()
    {
        return $this->object->req_id;
    }
}