<?php

Class Curso {

    private $cr_id;
    private $cr_categoriaFK;
    private $cr_titulo;
    private $cr_descripcion;
    private $cr_horainicial;
    private $cr_horafinal;
    private $cr_foto;

    function __construct($cr_id, $cr_categoriaFK, $cr_titulo, $cr_descripcion, $cr_horainicial, $cr_horafinal, $cr_foto) {
        $this->cr_id = $cr_id;
        $this->cr_categoriaFK = $cr_categoriaFK;
        $this->cr_titulo = $cr_titulo;
        $this->cr_descripcion = $cr_descripcion;
        $this->cr_horainicial = $cr_horainicial;
        $this->cr_horafinal = $cr_horafinal;
        $this->cr_foto = $cr_foto;
    }

    function getCr_id() {
        return $this->cr_id;
    }

    function getCr_categoriaFK() {
        return $this->cr_categoriaFK;
    }

    function getCr_titulo() {
        return $this->cr_titulo;
    }

    function getCr_descripcion() {
        return $this->cr_descripcion;
    }

    function getCr_horainicial() {
        return $this->cr_horainicial;
    }

    function getCr_horafinal() {
        return $this->cr_horafinal;
    }

    function getCr_foto() {
        return $this->cr_foto;
    }

}

?>
