<?php

Class Empleo {

    private $e_id ;
    private $a_empresaFK;
    private $e_nombre;
    private $e_requisitos;

    function __construct($e_id, $a_empresaFK, $e_nombre, $e_requisitos) {
        $this->e_id = $e_id;
        $this->a_empresaFK = $a_empresaFK;
        $this->e_nombre = $e_nombre;
        $this->e_requisitos = $e_requisitos;
    }

    function getE_id() {
        return $this->e_id;
    }

    function getA_empresaFK() {
        return $this->a_empresaFK;
    }

    function getE_nombre() {
        return $this->e_nombre;
    }

    function getE_requisitos() {
        return $this->e_requisitos;
    }



}

?>
