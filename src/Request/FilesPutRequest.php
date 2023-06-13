<?php
namespace Bot\Titan\Request;

use Bot\Titan\Model\File;

class FilesPutRequest extends AbstractRequest
{

    private $put_url;
    
    private File $file;

    function __construct( File $file)
    {
        parent::__construct();
        $this->file = $file;
    }

    protected function doRequest()
    {
        $headers = [
            'accept' => '*/*',
            'accept-encoding' => 'gzip, deflate, br',
            'accept-language' => 'en-US,en;q=0.9',
            'content-disposition' => 'filename='.$this->file->getFilename(), 
            'content-length' => strval($this->file->getSize()), //'105301',
            'content-type' => $this->file->getContent_type(), //'image/png',
            'origin' => 'https://titan.hostgator.com.br',
            'referer' => 'https://titan.hostgator.com.br/mail/',
            'sec-ch-ua' => '" Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"',
            'sec-ch-ua-mobile' => '?0',
            'sec-ch-ua-platform' => '"Linux"',
            'sec-fetch-dest' => 'empty',
            'sec-fetch-mode' => 'cors',
            'sec-fetch-site' => 'cross-site',
            'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.41 Safari/537.36',
            'x-amz-acl' => 'bucket-owner-full-control'
        ];
        
        
        $params = [
//             'multipart' => [
//                 [
//                     'name' => $this->file->getId(),//'archive[content]',
//                     'contents' => $this->file->getContents(),
//                     'Mime-Type'=> $this->file->getContent_type(),
//                     'filename' => $this->file->getFilename()
//                 ]
//             ],
            'body' => $this->file->getContents(),
            'headers' => $headers
        ];
        
        $this->response = $this->request('PUT', $this->file->getPut_url(), $params);
        var_dump($this->file->getPut_url());

        return $this->response;
    }
}

