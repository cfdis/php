<?php

namespace facturabilidad;

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
class Cfdi33Client extends Facturabilidad {

    function __construct($apiId = null, $apiSecret = null, $production = false) {
        if ($production) {
            $apiUrl = "https://backend.facturabilidad.com/api";
        } else {
            $apiUrl = "http://backend.demo.facturabilidad.com/api";
            //$this->apiUrl = "http://local.backend.facturabilidad.com/api";
        }
        parent::__construct($apiUrl, $apiId, $apiSecret);
    }

    public function timbrar($cfdi) {
        call('Cfdi33', 'timbrar', $cfdi);
    }

}
