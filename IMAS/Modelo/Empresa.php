<?php

Class Empresa {

    private $e_id;
    private $e_nit;
    private $e_razonsocial;
    private $e_direccion;
    private $e_correo;
    private $e_nequi;
    private $e_bancolombia;
    private $e_daviplata;
    private $e_whatsaap;

    function __construct($e_id, $e_nit, $e_razonsocial, $e_direccion, $e_correo, $e_nequi, $e_bancolombia, $e_daviplata, $e_whatsaap) {
        $this->e_id = $e_id;
        $this->e_nit = $e_nit;
        $this->e_razonsocial = $e_razonsocial;
        $this->e_direccion = $e_direccion;
        $this->e_correo = $e_correo;
        $this->e_nequi = $e_nequi;
        $this->e_bancolombia = $e_bancolombia;
        $this->e_daviplata = $e_daviplata;
        $this->e_whatsaap = $e_whatsaap;
    }

    function getE_id() {
        return $this->e_id;
    }

    function getE_nit() {
        return $this->e_nit;
    }

    function getE_razonsocial() {
        return $this->e_razonsocial;
    }

    function getE_direccion() {
        return $this->e_direccion;
    }

    function getE_correo() {
        return $this->e_correo;
    }

    function getE_nequi() {
        return $this->e_nequi;
    }

    function getE_bancolombia() {
        return $this->e_bancolombia;
    }

    function getE_daviplata() {
        return $this->e_daviplata;
    }

    function getE_whatsaap() {
        return $this->e_whatsaap;
    }

}
?>

