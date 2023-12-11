<?php

Class ControladorPagina {

    public function verPagina($ruta) {
        require_once $ruta;
    }

    public function Index() {
        require_once 'Vista/html/index.php';
    }

}

?>
