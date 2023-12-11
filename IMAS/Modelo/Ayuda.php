<?php

Class Ayuda {

    private $a_id;
    private $a_empresaFK;
    private $a_tipoayuda;

    function __construct($a_id, $a_empresaFK, $a_tipoayuda) {
        $this->a_id = $a_id;
        $this->a_empresaFK = $a_empresaFK;
        $this->a_tipoayuda = $a_tipoayuda;
    }

    function getA_id() {
        return $this->a_id;
    }

    function getA_empresaFK() {
        return $this->a_empresaFK;
    }

    function getA_tipoayuda() {
        return $this->a_tipoayuda;
    }

}

?>
