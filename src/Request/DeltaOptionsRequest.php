<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;

class DeltaOptionsRequest extends AbstractRequest
{
    private $base_url;

    private $session;
    
    private $ctid;
    
    function __construct($base_url, $session, $ctid)
    {
        parent::__construct();
        $this->base_url = $base_url;
        $this->session = $session;
        $this->ctid = $ctid;
    }

    protected function doRequest()
    {
        
        $headers = [
            'Accept' => 'application/json, text/plain, */*',
            'Referer' => 'https://titan.hostgator.com.br/488339fcdab5896e95cb.worker.js',
            'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.41 Safari/537.36',
            'X-API-Endpoint' => $this->base_url, //https://api.flockmail.com/s/1002/1213270/',
            'X-Session-Token' =>  $this->session //'1:sVDG5jRervhHnjwzrMgq4AgaMt3wZjmH'
        ];
        
        $query = [
            'query' => [
                'cursor' => $this->ctid
            ] 
        ];
        
        $params = [
//             'query' => $query,
            'headers' => $headers
        ];

        $this->response = $this->request('GET', $this->base_url.'delta', $params);
        
        
        return $this->response;
    }
    
}

