<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;

class InternalOptionsRequest extends AbstractRequest
{
    function __construct()
    {
        parent::__construct();
    }

    protected function doRequest()
    {
        $this->response = $this->request('OPTIONS', 'https://bll.titan.email/internal/email/get?email=api%40your-domain.com');

        return $this->response;
    }
}

