<?php

class Usuario {

    private $u_id;
    private $u_identificacion;
    private $u_nombrerazon;
    private $u_celular;
    private $u_correo;
    private $u_contrasena;
    private $u_rol;

    function __construct($u_id, $u_identificacion, $u_nombrerazon, $u_celular, $u_correo, $u_contrasena, $u_rol) {
        $this->u_id = $u_id;
        $this->u_identificacion = $u_identificacion;
        $this->u_nombrerazon = $u_nombrerazon;
        $this->u_celular = $u_celular;
        $this->u_correo = $u_correo;
        $this->u_contrasena = $u_contrasena;
        $this->u_rol = $u_rol;
    }

    function getU_id() {
        return $this->u_id;
    }

    function getU_identificacion() {
        return $this->u_identificacion;
    }

    function getU_nombrerazon() {
        return $this->u_nombrerazon;
    }

    function getU_celular() {
        return $this->u_celular;
    }

    function getU_correo() {
        return $this->u_correo;
    }

    function getU_contrasena() {
        return $this->u_contrasena;
    }

    function getU_rol() {
        return $this->u_rol;
    }

}

?>