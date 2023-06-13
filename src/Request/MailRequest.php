<?php
namespace Bot\Titan\Request;

use Bot\Titan\Request\AbstractRequest;

class MailRequest extends AbstractRequest
{
    public $email;

    public $password;

    function __construct()
    {
        parent::__construct();
    }

    protected function doRequest()
    {
        // $config = include (__DIR__ . '/../../config/config.php');

        // $json = [
        // 'email' => $config->login->email,
        // 'password' => $config->login->password
        // ];

        $this->response = $this->request('GET', 'https://titan.hostgator.com.br/mail/');

        return $this->response;
    }
}

