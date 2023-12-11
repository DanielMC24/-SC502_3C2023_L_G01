<?php

Class RegistroEmpleo {

    private $re_id;
    private $re_usuarioFK;
    private $re_empleoFK;
    private $re_fecha;
    private $re_cv; /// archivo

    function __construct($re_id, $re_usuarioFK, $re_empleoFK, $re_fecha, $re_cv) {
        $this->re_id = $re_id;
        $this->re_usuarioFK = $re_usuarioFK;
        $this->re_empleoFK = $re_empleoFK;
        $this->re_fecha = $re_fecha;
        $this->re_cv = $re_cv;
    }

    function getRe_id() {
        return $this->re_id;
    }

    function getRe_usuarioFK() {
        return $this->re_usuarioFK;
    }

    function getRe_empleoFK() {
        return $this->re_empleoFK;
    }

    function getRe_fecha() {
        return $this->re_fecha;
    }

    function getRe_cv() {
        return $this->re_cv;
    }

}

?>
