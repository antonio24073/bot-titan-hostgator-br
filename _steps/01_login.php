<?php

use Bot\Titan\Request\DashboardRequest;
use Bot\Titan\Request\MailSessionInfoRequest;
use Bot\Titan\Request\LoginRequest;
use Bot\Titan\Request\AddPreAuthEventsPostRequest;
use Bot\Titan\Request\AddPreAuthEventsOptionsRequest;
use Bot\Titan\Singleton\ClientSingleton;
use Bot\Titan\Request\MailSessionInfoPostRequest;
use Bot\Titan\Request\MailSessionInfoOptionsRequest;
use Bot\Titan\Request\InternalOptionsRequest;
use Bot\Titan\Request\InternalGetRequest;
use Bot\Titan\Request\MailRequest;
use Bot\Titan\Request\SendRequest;

require_once __DIR__ . '/../vendor/autoload.php';


$email = "";
$password = "";

print_r(PHP_EOL.PHP_EOL.PHP_EOL);

// $request = new LoginRequest();
// var_dump($request->getContents());

// print_r(PHP_EOL.PHP_EOL.PHP_EOL);

// $request = new AddPreAuthEventsPostRequest();
// var_dump($request->getContents());

// print_r(PHP_EOL.PHP_EOL.PHP_EOL);

// $request = new AddPreAuthEventsOptionsRequest();
// var_dump($request->getContents());

// print_r(PHP_EOL.PHP_EOL.PHP_EOL);

// $request = new MailSessionInfoOptionsRequest('', '');
// var_dump($request->getContents());

// print_r(PHP_EOL.PHP_EOL.PHP_EOL);

$request = new MailSessionInfoPostRequest($email, $password);
var_dump($request->getContents());exit;


// $filter = $request->filterBy();

// $base_url = $filter->base_url();
// $session = $filter->session();

// var_dump($base_url, $session);

print_r(PHP_EOL.PHP_EOL.PHP_EOL);




