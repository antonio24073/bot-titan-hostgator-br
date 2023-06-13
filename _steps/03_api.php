<?php
// if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
//     echo $_SERVER['REQUEST_METHOD'];
//     echo "404 - Error";
//     return;
// }

use Bot\Titan\Impl\ApiImpl;
use Bot\Titan\Utils\Convert;
use Bot\Titan\Utils\Validate;

require_once __DIR__ . '/../vendor/autoload.php';


$config = include (__DIR__ . '/../config/config.php');
if ($config->debug !== true) {
    error_reporting(0);
} else {
    ini_set('display_errors', 'on');
    error_reporting(E_ALL & ~ E_WARNING & ~ E_NOTICE);
}


$json = '{"login":{"email":"","password":""},"send":[{"subject":"Api","body":"Teste novo","to":[{"email":"","name":""},{"email":"","name":""}],"cc":[],"bcc":[],"files":[]}]}';
$json_structure = '{"login":{"email":"","password":""},"send":[{"subject":"Api","body":"Teste novo","to":[{"email":"","name":"Alfredo"},{"email":"","name":"Adolfo"}],"cc":[],"bcc":[],"files":[]}]}';
if (! Validate::api_json($json_structure, $json)) {
    echo 'Invalid json fields';
    return;
}

$data = Convert::recursive_json_to_object($json);

echo ApiImpl::send($data);
