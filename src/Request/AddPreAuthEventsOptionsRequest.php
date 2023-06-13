<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;

class AddPreAuthEventsOptionsRequest extends AbstractRequest
{
    function __construct()
    {
        parent::__construct();
    }

    protected function doRequest()
    {
        $this->response = $this->request('OPTIONS', 'https://api.flockmail.com/m/addPreAuthEvents');
        return $this->response;
    }
}

