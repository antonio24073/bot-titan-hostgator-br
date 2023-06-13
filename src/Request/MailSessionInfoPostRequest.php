<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;
use Bot\Titan\Filter\MailSessionInfoPostFilter;

class MailSessionInfoPostRequest extends AbstractRequest
{
    public $email;

    public $password;

    function __construct($email, $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    protected function doRequest()
    {
        // $config = include (__DIR__ . '/../../config/config.php');

        // $json = [
        // 'email' => $config->login->email,
        // 'password' => $config->login->password
        // ];
        $json = [
            "email" => $this->email, 
            "password" => $this->password, 
            "device" => "browser",
            "os" => "",
            "fetch_mail_properties" => true,
            "installation_id" => "Chrome-browser-1652369335259",
            "rp" => [
                "brand" => "Titan"
            ]
        ];
        

        $headers = [
            'accept' => 'application/json, text/plain, */*',
            'accept-encoding' => 'gzip, deflate, br',
            'accept-language' => 'en-US,en;q=0.9',
            'content-length' => strlen(json_encode($json)),
            'content-type' => 'application/json',
            'origin' => 'https://titan.hostgator.com.br',
            'referer' => 'https://titan.hostgator.com.br/login/',
            'sec-ch-ua' => '" Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"',
            'sec-ch-ua-mobile' => '?0',
            'sec-ch-ua-platform' => '"Linux"',
            'sec-fetch-dest' => 'empty',
            'sec-fetch-mode' => 'cors',
            'sec-fetch-site' => 'cross-site',
            'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.41 Safari/537.36'
        ];

        $params = [
            'headers' => $headers,
            'json' => $json
        ];

        $this->response = $this->request('POST', 'https://api.flockmail.com/r/mailSessionInfo', $params);

        return $this->response;
    }
    
    public function filterBy()
    {
        return new MailSessionInfoPostFilter($this->getContents());
    }
}

