<?php

Class RegistroAyuda {

    private $ra_id;
    private $ra_usuarioFK;
    private $ra_ayudaFK;
    private $ra_motivo;
    private $ra_fecha;
    private $ra_evidencia; /// archivo
    
    function __construct($ra_id, $ra_usuarioFK, $ra_ayudaFK, $ra_motivo, $ra_fecha, $ra_evidencia) {
        $this->ra_id = $ra_id;
        $this->ra_usuarioFK = $ra_usuarioFK;
        $this->ra_ayudaFK = $ra_ayudaFK;
        $this->ra_motivo = $ra_motivo;
        $this->ra_fecha = $ra_fecha;
        $this->ra_evidencia = $ra_evidencia;
    }

    function getRa_id() {
        return $this->ra_id;
    }

    function getRa_usuarioFK() {
        return $this->ra_usuarioFK;
    }

    function getRa_ayudaFK() {
        return $this->ra_ayudaFK;
    }

    function getRa_motivo() {
        return $this->ra_motivo;
    }

    function getRa_fecha() {
        return $this->ra_fecha;
    }

    function getRa_evidencia() {
        return $this->ra_evidencia;
    }


}

?>
