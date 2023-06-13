<?php
namespace Bot\Titan\Request;

use Bot\Titan\Filter\FilesPostFilter;
use Bot\Titan\Model\File;


class FilesPostRequest extends AbstractRequest
{

    private $base_url;

    private $session;

    private $draft_mid;
    
    private File $file;

    function __construct($base_url, $session, $draft_mid, File $file)
    {
        parent::__construct();
        $this->base_url = $base_url;
        $this->session = $session;
        $this->draft_mid = $draft_mid;
        $this->file = $file;
    }

    protected function doRequest()
    {
        $json = [
            "filename" => $this->file->getFilename(),
            "disposition" => "ATTACHMENT",
            "content_type" => $this->file->getContent_type(), //"image/png",
            "size" => $this->file->getSize(), //105301,
            "encoding" => null,
            "mid" => $this->draft_mid // "97f44ef354315d11d18e38b9e8aaaf56"
        ];
        
        //chrome
        $headers = [
            'accept' => 'application/json, text/plain, */*',
            'accept-encoding' => 'gzip, deflate, br',
            'accept-language' => 'en-US,en;q=0.9',
            'content-length' => strlen(json_encode($json)), //'148',
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
            'x-api-endpoint' => $this->base_url, //'https://api.flockmail.com/s/1002/1213270/',
            'x-session-token' => $this->session //'1:261Rdekw74OKpjxvm9Fnm5eEOxMdrQ7q',
        ];
        
//         POST /s/1002/1213270/files HTTP/2
        
        //firefox
//         $headers = [
//             'Host' => 'api.flockmail.com',
//             'User-Agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:100.0) Gecko/20100101 Firefox/100.0',
//             'Accept' => 'application/json, text/plain, */*',
//             'Accept-Language' => 'en-US,en;q=0.5',
//             'Accept-Encoding' => 'gzip, deflate, br',
//             'Content-Type' => 'application/json',
//             'X-Session-Token' => $this->session, //'1:4w9LJ62QHomNibrnfDPCOV6VX0dHJMuo',
//             'X-API-Endpoint' => $this->base_url, //'https://api.flockmail.com/s/1002/1213270/',
//             'Content-Length' => '148',
//             'Origin' => 'https://titan.hostgator.com.br',
//             'Connection' => 'keep-alive',
//             'Referer' => 'https://titan.hostgator.com.br/',
//             'Sec-Fetch-Dest' => 'empty',
//             'Sec-Fetch-Mode' => 'cors',
//             'Sec-Fetch-Site' => 'cross-site',
//             'TE' => 'trailers'
//         ];
        
        
        $params = [
//             'multipart' => [
//                 [
//                     'name' => 'archive[content]',
//                     'contents' => $this->file->getContents(),
//                     'filename' => $this->file->getFilename()
//                 ]
//             ],
            'body' => $this->file->getContents(),
            'json' => $json,
            'headers' => $headers
        ];
//         var_dump($params);

        $this->response = $this->request('POST', $this->base_url . 'files', $params);

        return $this->response;
    }

    public function filterBy()
    {
        return new FilesPostFilter($this->getContents());
    }
}

