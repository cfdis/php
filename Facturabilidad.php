<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Facturabilidad
 *
 * @author eislas
 */
class Facturabilidad {

    var $apiUrl;
    var $apiId;
    var $apiSecret;

    function __construct($apiUrl = null, $apiId = null, $apiSecret = null) {
        $this->apiUrl = $apiUrl;
        $this->apiId = $apiId;
        $this->apiSecret = $apiSecret;
    }

    function call($entidad, $operacion, $params = array()) {


        $token = base64_encode($this->apiId . ':' . $this->apiSecret);
        $headers = array();

        $headers[] = 'Content-Type: application/json';
        $headers[] = "Accept: application/json, text/javascript, */*; q=0.01";
        $headers[] = "Authorization: Basic $token";

//        $urlParams = http_build_query(array('entidad' => $entidad, 'operacion' => $operacion));
//        $url = $this->apiUrl . '?' . $urlParams;
        $url = $this->apiUrl . "/$entidad/$operacion";


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0");
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $server_output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);



        curl_close($ch);
        $response = json_decode($server_output);
        if (NULL === $response) {
            throw new Exception($httpcode . ': ' . $server_output);
        } else {
            return $response;
        }
    }

}
