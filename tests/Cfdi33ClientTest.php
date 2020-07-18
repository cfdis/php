<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class Cfdi33ClientTest extends TestCase {

    var $apiId = 'uq4ZWSWme1m6LwoDO3KuCXkM0tlNCuoW';
    var $apiSecret = 'crkQ0FZTkAtqcy4zqRrWlIpMv2nbuJRz';
//    var $apiId = 'StWJNHkw8JrPTPJ2aBfV2DeOtoE0KR4x';
//    var $apiSecret = '7CU/1sZhUkosm39pF+2Qs3mPrVH9l04i';

    public function testTimbrado(): void {
        $client = new \Facturabilidad\Cfdi33Client($this->apiId, $this->apiSecret);
        $jsonCfdi = file_get_contents(__DIR__ . '/../test.json');
        $cfdi = json_decode($jsonCfdi);
        $response = $client->timbrar($cfdi);
        $this->assertTrue($response->success);
    }
    public function testPasadas72Horas(): void {
        $client = new \Facturabilidad\Cfdi33Client($this->apiId, $this->apiSecret);
        $jsonCfdi = file_get_contents(__DIR__ . '/../test.json');
        $cfdi = json_decode($jsonCfdi);
        $cfdi->Fecha = '2020-01-01T00:00:00';
        $response = $client->timbrar($cfdi);
        $this->assertStringStartsWith('CFDI33101', $response);
    }
    public function testEmpty(): void {
        $client = new \Facturabilidad\Cfdi33Client($this->apiId, $this->apiSecret);
        $cfdi = new stdClass();
        $response = $client->timbrar($cfdi);
        $this->assertStringStartsWith('Falta el elemento', $response);
    }
    public function testInvalidApi(): void {
        $this->expectException(\Exception::class);
        
        $client = new \Facturabilidad\Cfdi33Client('', '');
        $cfdi = new stdClass();
        $client->timbrar($cfdi);
    }

}
