<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;

class InternalGetRequest extends AbstractRequest
{
    private $base_url;
    
    private $session;
    
    private $email;
    
    function __construct($base_url, $session, $email)
    {
        parent::__construct();
        $this->base_url = $base_url;
        $this->session = $session;
        $this->email = $email;
    }

    protected function doRequest()
    {
        
        
        $headers = [
            'accept' => 'application/json, text/plain, */*',
            'accept-encoding' => 'gzip, deflate, br',
            'accept-language' => 'en-US,en;q=0.9',
            'origin' => 'https://titan.hostgator.com.br',
            'referer' => 'https://titan.hostgator.com.br/login/',
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
        
        $query = [
            'email' => $this->email //'api@your-domain.com'
        ];
        
        
        $params = [
            'headers' => $headers,
            'query' => $query
        ];
        
        
        $this->response = $this->request('GET', 'https://bll.titan.email/internal/email/get', $params);

        return $this->response;
    }
    
    
}

