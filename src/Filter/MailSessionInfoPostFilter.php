<?php
namespace Bot\Titan\Filter;

class MailSessionInfoPostFilter extends AbstractJsonFilter
{
    public function mail_id()
    {
        return $this->object->mail_id;
    }
    public function session()
    {
        return $this->object->session;
    }
    public function base_url()
    {
        return $this->object->base_url;
    }
    
    public function latest_txn_id()
    {
        return $this->object->latest_txn_id;
    }
    
}