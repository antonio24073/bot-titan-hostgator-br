<?php
namespace Bot\Titan\Request;

use Bot\Titan\Singleton\ClientSingleton;

abstract class AbstractRequest
{

    protected $client;
    
    public $content;

    public $response;

    public function __construct()
    {
        $this->client = ClientSingleton::getInstance();
    }

    protected function request($method, $uri, array $options = [])
    {
        try {
            return $this->client->request($method, $uri, $options);
        } catch (\Exception $e) {
            print_r($e->getMessage());
            error_log($e);
            exit;
        }
    }

    abstract protected function doRequest();

    public function getContents()
    {
        $this->content = $this->doRequest()
            ->getBody()
            ->getContents();
        $this->content = mb_convert_encoding($this->content, 'UTF-8', mb_detect_encoding($this->content, 'UTF-8, ISO-8859-1', true));
        
        print_r(PHP_EOL);
        return $this->content;
    }
}