<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;
use Bot\Titan\Filter\SendPostFilter;
use Bot\Titan\Utils\Convert;

class SendPostRequest extends AbstractRequest
{

    private $base_url;

    private $session;

    private $draft_mid;

    private $ctid;

    private $req_id;

    private $thread_id;

    private $mid;

    private $mhid;
    
    private $send;

    function __construct($base_url, $session, $draft_mid, $ctid, $req_id, $thread_id, $mid, $mhid, $send)
    {
        parent::__construct();
        $this->base_url = $base_url;
        $this->session = $session;
        $this->draft_mid = $draft_mid;
        $this->ctid = $ctid;
        $this->req_id = $req_id;
        $this->thread_id = $thread_id;
        $this->mid = $mid;
        $this->mhid = $mhid;
        $this->send = $send;
    }

    protected function doRequest()
    {
        $json = [
            "ctid" => $this->ctid, 
            "crid" => $this->req_id, 
            "thread_id" => $this->thread_id,
            "mhid" => $this->mhid, // null,
            "rmhid" => null,
            "pmhid" => null,
            // "subject" => "Conseguiu 03",
            // "body" => 'Teste novo<img class="flm-open" width="0" height="0" style="border:0;width:0;height:0;display:block;" data-open-tracking-src="{{track-read-receipt}}">',
            // "to" => [
            // [
            // "name" => "",
            // "email" => ""
            // ],
            // // [
            // // "name" => "",
            // // "email" => ""
            // // ]
            // ],
            // "cc" => [
            // ],
            // "bcc" => [
            // ],
            "sender" => null,
//             "files" => [],
            "tracked" => true,
            "flowId" => substr_replace(strval(time()), "se-", -4, 0), 
            "refs" => [],
            "mid" => $this->mid, // null,
            "draftMid" => $this->draft_mid,
            "delayInSecs" => 5,
            "rp" => [
                "os" => "UNIX"
            ]
        ];
        $json = $json + Convert::recursive_object_to_array($this->send);
       
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
            'x-api-endpoint' => $this->base_url, // 'https://api.flockmail.com/s/1002/1213270/
            'x-session-token' => $this->session
        ];

        $params = [
            'json' => $json,
            'headers' => $headers
        ];

        $this->response = $this->request('POST', $this->base_url . 'v2/send/', $params);

        return $this->response;
    }

    public function filterBy()
    {
        return new SendPostFilter($this->getContents());
    }
}

