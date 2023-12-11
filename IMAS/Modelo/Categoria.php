<?php

Class Categoria {

    private $c_id;
    private $c_categoria;

    function __construct($c_id, $c_categoria) {
        $this->c_id = $c_id;
        $this->c_categoria = $c_categoria;
    }

        function getC_id() {
        return $this->c_id;
    }

    function getC_categoria() {
        return $this->c_categoria;
    }



}

?>
