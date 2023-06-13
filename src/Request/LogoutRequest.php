<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;
use Bot\Titan\Filter\SendPostFilter;

class LogoutRequest extends AbstractRequest
{
    private $base_url;

    private $session;

    function __construct($base_url, $session)
    {
        parent::__construct();
        $this->base_url = $base_url;
        $this->session = $session;
    }

    protected function doRequest()
    {

        $headers = [
            'accept' => 'application/json, text/plain, */*',
            'accept-encoding' => 'gzip, deflate, br',
            'accept-language' => 'en-US,en;q=0.9',
            'content-length' => '0',
            'origin' => 'https://titan.hostgator.com.br',
            'referer' => 'https://titan.hostgator.com.br/mail/',
            'sec-ch-ua' => '" Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"',
            'sec-ch-ua-mobile' => '?0',
            'sec-ch-ua-platform' => '"Linux"',
            'sec-fetch-dest' => 'empty',
            'sec-fetch-mode' => 'cors',
            'sec-fetch-site' => 'cross-site',
            'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.41 Safari/537.36',
            'x-api-endpoint' => $this->base_url, //'https://api.flockmail.com/s/1002/1213270/
            'x-session-token' => $this->session //1:joNML9VmxBOe2yZFZuU03jPxpYZ6so4V
        ];
        
        $params = [
            'headers' => $headers
        ];

        $this->response = $this->request('POST', $this->base_url.'logout', $params);
        
        
        return $this->response;
    }
    
}

