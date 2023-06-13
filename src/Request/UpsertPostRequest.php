<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;
use Bot\Titan\Filter\UpsertPostFilter;

class UpsertPostRequest extends AbstractRequest
{
    private $base_url;

    private $session;
    
    private $ctid;
    
    private $crid;

    function __construct($base_url, $session, $ctid, $crid)
    {
        parent::__construct();
        $this->base_url = $base_url;
        $this->session = $session;
        $this->ctid = $ctid;
        $this->crid = $crid;
    }

    protected function doRequest()
    {
       
        $json = [
//             "ctid" => $this->ctid, 
            "ctid" => $this->ctid,
            "crid" => $this->crid, 
            "thread_id" => null,
            "mhid" => null,
            "rmhid" => null,
            "pmhid" => null,
            "subject" => "",
            "body" => "",
            "to" => [
            ],
            "cc" => [
            ],
            "bcc" => [
            ],
            "sender" => null,
            "files" => [
            ],
            "flowId" => substr_replace(strval(time()), "df-", -4, 0), 
            "refs" => [
            ],
            "mid" => null
        ]; 
        
        $headers = [
            'accept' => 'application/json, text/plain, */*',
            'accept-encoding' => 'gzip, deflate, br',
            'accept-language' => 'en-US,en;q=0.9',
            'content-length' => strlen(json_encode($json)),
            'content-type' => 'application/json',
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
            'x-session-token' => $this->session 
        ];
        
        $params = [
            'json' => $json,
            'headers' => $headers
        ];
        

        $this->response = $this->request('POST', $this->base_url.'drafts/upsert', $params);
        
        return $this->response;
    }
    
    public function filterBy()
    {
        return new UpsertPostFilter($this->getContents());
    }
}

