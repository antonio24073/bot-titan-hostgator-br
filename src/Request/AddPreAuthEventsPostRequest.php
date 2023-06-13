<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;

class AddPreAuthEventsPostRequest extends AbstractRequest
{
    function __construct()
    {
        parent::__construct();
    }

    protected function doRequest()
    {
        $json = [
            "events" => [
                [
                    "attrs" => [
                        "event_id" => "c1e4bc40",
                        "browser_language_preferences" => [
                            "en-US",
                            "en"
                        ],
                        "page_url" => "https://titan.hostgator.com.br/login/",
                        "screen_resolution" => "1311x2163",
                        "brand" => "Titan",
                        "locale" => "pt-BR",
                        "timezone" => "-3:0",
                        "app_version" => "4.0.179",
                        "os" => "Linux",
                        "os_version" => "",
                        "browser" => "Chrome",
                        "browser_version" => "101",
                        "device_id" => "Chrome-browser-1652369335259",
                        "device" => "web",
                        "no_of_accounts" => 0,
                        "account_ids" => [
                        ]
                    ],
                    "entityId" => "dummy_entity_id",
                    "eventTs" => 1652393400297,
                    "eventName" => "login_page_visit"
                ],
                [
                    "attrs" => [
                        "event_id" => "a9187238",
                        "browser_language_preferences" => [
                            "en-US",
                            "en"
                        ],
                        "page_url" => "https://titan.hostgator.com.br/login/",
                        "screen_resolution" => "1311x2163",
                        "brand" => "Titan",
                        "locale" => "pt-BR",
                        "timezone" => "-3:0",
                        "app_version" => "4.0.179",
                        "os" => "Linux",
                        "os_version" => "",
                        "browser" => "Chrome",
                        "browser_version" => "101",
                        "device_id" => "Chrome-browser-1652369335259",
                        "device" => "web",
                        "no_of_accounts" => 0,
                        "account_ids" => [
                        ]
                    ],
                    "entityId" => "dummy_entity_id",
                    "eventTs" => 1652393405013,
                    "eventName" => "login_page_visit"
                ]
            ],
            "product" => "email",
            "type" => "flock_account"
        ];
        
        $headers = [
            'accept' => 'application/json, text/plain, */*',
            'accept-encoding' => 'gzip, deflate, br',
            'accept-language' => 'en-US,en;q=0.9',
            'content-length' => '541',
            'content-type' => 'application/json',
            'origin' => 'https://titan.hostgator.com.br',
            'referer' => 'https://titan.hostgator.com.br/login/',
            'sec-ch-ua' => '" Not A;Brand";v="99", "Chromium";v="101", "Google Chrome";v="101"',
            'sec-ch-ua-mobile' => '?0',
            'sec-ch-ua-platform' => '"Linux"',
            'sec-fetch-dest' => 'empty',
            'sec-fetch-mode' => 'cors',
            'sec-fetch-site' => 'cross-site',
            'user-agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.41 Safari/537.36',
            'x-api-endpoint' => 'https://api.flockmail.com/m'
        ];
        $params = [
            'json' => $json,
            'headers' => $headers,
        ];
        
        $this->response = $this->request('POST', 'https://api.flockmail.com/m/addPreAuthEvents', $params);
        return $this->response;
    }
}

