<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;

class ClientAttrGetRequest extends AbstractRequest
{
    function __construct()
    {
        parent::__construct();
    }

    protected function doRequest()
    {

        $headers = [
            'accept' => '*/*',
            'accept-encoding' => 'gzip, deflate, br',
            'accept-language' => 'en-US,en;q=0.9',
            'access-control-request-headers' => 'content-type,x-api-endpoint,x-session-token',
            'access-control-request-method' => 'POST',
            'origin' => 'https://titan.hostgator.com.br',
            'referer' => 'https://titan.hostgator.com.br/mail/',
            'sec-fetch-dest' => 'empty',
            'sec-fetch-mode' => 'cors',
            'sec-fetch-site' => 'cross-site',
            'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.41 Safari/537.36'
        ];

        $params = [
            'headers' => $headers
        ];

        $this->response = $this->request('OPTIONS', 'https://api.flockmail.com/r/client/attrs/get', $params);

        return $this->response;
    }
}

