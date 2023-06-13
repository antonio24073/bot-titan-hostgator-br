<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;

class LoginRequest extends AbstractRequest
{
    function __construct()
    {
        parent::__construct();
    }

    protected function doRequest()
    {
        $headers = [
            'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
            'accept-encoding' => 'gzip, deflate, br',
            'accept-language' => 'en-US,en;q=0.9',
            'cookie' => '_ga=GA1.3.1078258727.1652369112; _gid=GA1.3.732888412.1652369112; G_ENABLED_IDPS=google; _gat_UA-137829044-2=1',
            'if-modified-since' => 'Wed, 11 May 2022 13:36:25 GMT',
            'if-none-match' => 'W/"31efadc84e024df2aed7dd0e13b9d306"',
            'referer' => 'https://titan.hostgator.com.br/mail/',
            'sec-ch-ua' => '" Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"',
            'sec-ch-ua-mobile' => '?0',
            'sec-ch-ua-platform' => '"Linux"',
            'sec-fetch-dest' => 'document',
            'sec-fetch-mode' => 'navigate',
            'sec-fetch-site' => 'same-origin',
            'sec-fetch-user' => '?1',
            'upgrade-insecure-requests' => '1',
            'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.41 Safari/537.36'
        ];
        
        $params = [
            'headers' => $headers
        ];
        
        $this->response = $this->request('GET', 'https://titan.hostgator.com.br/login/', $params);

        return $this->response;
    }
}

