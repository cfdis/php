<?php

ini_set('display_errors', 1);
require_once __dir__ . '/../vendor/autoload.php';


$apiId = 'uq4ZWSWme1m6LwoDO3KuCXkM0tlNCuoW';
$apiSecret = 'crkQ0FZTkAtqcy4zqRrWlIpMv2nbuJRz';
//$apiId = 'StWJNHkw8JrPTPJ2aBfV2DeOtoE0KR4x';
//$apiSecret = '7CU/1sZhUkosm39pF+2Qs3mPrVH9l04i';

$client = new \Facturabilidad\Cfdi33Client($apiId, $apiSecret, false);

$jsonCfdi = file_get_contents(__DIR__ . '/../test.json');
$cfdi = json_decode($jsonCfdi);
$response = $client->timbrar($cfdi);
var_dump($response);
