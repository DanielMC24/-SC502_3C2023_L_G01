<?php

class ControladorAyuda {

    public function AyudaMostrar($idperfil) {
        $bdadmin = new UsuarioDAO();
        $bdayuda = new AyudaDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdayuda->AyudaMostrar();
        require_once 'Vista/html/ayudas.php';
    }
    
     public function AyudaMostrarCatalogo($idperfil) {
        $bdadmin = new UsuarioDAO();
        $bdayuda = new AyudaDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdayuda->AyudaMostrar();
        require_once 'Vista/html/ayudascatalogo.php';
    }
      public function AyudaMostrarID($idperfil) {
        $bdadmin = new UsuarioDAO();
        $bdayuda = new AyudaDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdayuda->AyudaBuscarID($idperfil);
        require_once 'Vista/html/ayudamia.php';
    }

    public function AyudaAgregar($a_empresaFK, $a_tipoayuda, $idperfil) {
        $bdayuda = new AyudaDAO();
        $cantidad = $bdayuda->BuscarAyuda($a_empresaFK, $a_tipoayuda);
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Ya usted registro esta ayuda","warning");';
            echo '}, 1000);</script>';
        } else {
            $guardar = new Ayuda(null, $a_empresaFK, $a_tipoayuda);
            $bdayuda->AyudaGuardar($guardar);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Registrado","success");';
            echo '}, 1000);</script>';
        }
        $this->AyudaMostrarID($idperfil);
    }

    public function AyudaActualizar($a_id, $a_empresaFK, $a_tipoayuda,$a_tipoayudavieja, $idperfil) {
        $bdayuda = new AyudaDAO();

        if ($a_tipoayuda != $a_tipoayudavieja) {
        $cantidad = $bdayuda->BuscarAyuda($a_empresaFK, $a_tipoayuda);
            if ($cantidad != 0) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Ya usted registro esta ayuda","warning");';
                echo '}, 1000);</script>';
            } else {
                $actualizar = new Ayuda($a_id, $a_empresaFK, $a_tipoayuda);
                $bdayuda->AyudaActualizar($actualizar);
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Dato Actualizado","success");';
                echo '}, 1000);</script>';
            }
        } else {
                $actualizar = new Ayuda($a_id, $a_empresaFK, $a_tipoayudavieja);
            $bdayuda->AyudaActualizar($actualizar);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Actualizado","success");';
            echo '}, 1000);</script>';
        }

        $this->AyudaMostrarID($idperfil);
    }

    public function AyudaEliminar($id, $idperfil) { // verifar la velidicacio
        $bdayuda = new AyudaDAO();
        $cantidad = $bdayuda->AyudaBuscarRegistro($id);
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Contiene Registro en Ayudas de Clientes","warning");';
            echo '}, 1000);</script>';
        } else {
            $bdayuda->AyudaEliminar($id);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Elminado","success");';
            echo '}, 1000);</script>';
        }
        $this->AyudaMostrarID($idperfil);
    }

}

?>