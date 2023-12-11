<?php

Class RegistroCurso {

    private $rc_id;
    private $rc_usuarioFK;
    private $rc_cursoFK;

    function __construct($rc_id, $rc_usuarioFK, $rc_cursoFK) {
        $this->rc_id = $rc_id;
        $this->rc_usuarioFK = $rc_usuarioFK;
        $this->rc_cursoFK = $rc_cursoFK;
    }

    function getRc_id() {
        return $this->rc_id;
    }

    function getRc_usuarioFK() {
        return $this->rc_usuarioFK;
    }

    function getRc_cursoFK() {
        return $this->rc_cursoFK;
    }


}

?>
