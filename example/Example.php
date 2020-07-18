<?php

ini_set('display_errors', 1);
require_once __dir__ . '/../vendor/autoload.php';

use Cfdis\App\Api\Client\Cfdi33Client;

$apiId = 'uq4ZWSWme1m6LwoDO3KuCXkM0tlNCuoW';
$apiSecret = 'crkQ0FZTkAtqcy4zqRrWlIpMv2nbuJRz';
//$apiId = 'StWJNHkw8JrPTPJ2aBfV2DeOtoE0KR4x';
//$apiSecret = '7CU/1sZhUkosm39pF+2Qs3mPrVH9l04i';

$client = new Cfdi33Client($apiId, $apiSecret);

$jsonCfdi = file_get_contents(__DIR__ . '/../cfdi.json');
$cfdi = json_decode($jsonCfdi);
try {
    $response = $client->timbrar($cfdi);
    if (is_string($response)) {
        echo 'Mensaje: ' . $response;
    } else {
        echo "Cfdi generado exitosamente con id {$response->cfdiId} Descarga el pdf desde {$result->pdfUrl}";
    }
    var_dump($response);
} catch (\Exception $e) {
    echo $e->getMessage();
}
