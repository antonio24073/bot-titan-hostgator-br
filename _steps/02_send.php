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
use Bot\Titan\Request\SendPostRequest;
use Bot\Titan\Request\SendOptionsRequest;
use Bot\Titan\Request\UpsertPostRequest;
use Bot\Titan\Request\DeltaOptionsRequest;
use Bot\Titan\Request\ClientAttrGetRequest;
use Bot\Titan\Request\GetSyncAccountsOptionsRequest;
use Bot\Titan\Request\GetPartnerInfoOptionsRequest;
use Bot\Titan\Request\GetPartnerInfoGetRequest;
use Bot\Titan\Request\LogoutRequest;

require_once __DIR__ . '/../vendor/autoload.php';


$email = "";
$password = "";

// $request = new LoginRequest();
// var_dump($request->getContents());


// $request = new AddPreAuthEventsOptionsRequest();
// var_dump($request->getContents());

// $request = new AddPreAuthEventsPostRequest();
// var_dump($request->getContents());


// $request = new MailSessionInfoOptionsRequest($email, $password);
// var_dump($request->getContents());




$request = new MailSessionInfoPostRequest($email, $password);
// var_dump($request->getContents());exit;


$filter = $request->filterBy();

$base_url = $filter->base_url();
$session = $filter->session();
$ctid = strval($filter->latest_txn_id());

var_dump($filter->object());
var_dump($base_url,$session,$ctid); 


// $request = new DeltaOptionsRequest($base_url, $session, $ctid);
// var_dump($request->getContents());


// $request = new GetPartnerInfoOptionsRequest();
// var_dump($request->getContents());


// $request = new GetPartnerInfoGetRequest();
// var_dump($request->getContents());


// $request = new InternalOptionsRequest();
// var_dump($request->getContents());


$request = new InternalGetRequest($base_url, $session, $email);
var_dump($request->getContents());


// $request = new MailRequest();
// var_dump($request->getContents());


// $request = new ClientAttrGetRequest($base_url, $session, $email);
// var_dump($request->getContents());


// $request = new GetSyncAccountsOptionsRequest($base_url, $session, $email);
// var_dump($request->getContents());


// $request = new GetPartnerInfoOptionsRequest($base_url, $session, $email);
// var_dump($request->getContents());

$crid = exec('node '.__DIR__.'/../src/js/crid.js');
var_dump($crid); 

$request = new UpsertPostRequest($base_url, $session, $ctid, $crid);
// var_dump($request->getContents());exit;
$filter = $request->filterBy();

$draft_mid = $filter->draft_mid();
$req_id = $filter->req_id();
$thread_id = $filter->thread_id();
// var_dump($draft_mid);exit;

$request = new SendOptionsRequest($base_url);
var_dump($request->getContents());

$crid = exec('node '.__DIR__.'/../src/js/crid.js');

$request = new SendPostRequest($base_url, $session, $draft_mid, $ctid, $crid, $thread_id, null, null);
var_dump($request->getContents());
// $filter = $request->filterBy();

// var_dump($filter->json());

// $mid = $filter->mid();
// $mhid = $filter->mhid();

// $crid = exec('node '.__DIR__.'/../src/js/crid.js');



// $request = new SendPostRequest($base_url, $session, $draft_mid, $ctid, $crid, $thread_id, $mid, $mhid);
// var_dump($request->getContents());


$request = new LogoutRequest($base_url, $session);
var_dump($request->getContents());



