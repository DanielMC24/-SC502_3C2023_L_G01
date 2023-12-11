<?php

class ControladorRegistrarEmpleo {

    public function RegistrarEmpleoMostrar($idperfil) { // ADMNISTRADOR DE LAS EMPLESA
        $bdadmin = new UsuarioDAO();
        $bdregistrarempleo = new RegistroEmpleoDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdregistrarempleo->RegistroEmpleoMostrar();
        require_once 'Vista/html/empleospostulacion.php';
    }
    
     public function RegistrarEmpleoMostrarEmpresa($idperfil) { // ADMNISTRADOR DE LAS EMPLESA
        $bdadmin = new UsuarioDAO();
        $bdregistrarempleo = new RegistroEmpleoDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdregistrarempleo->RegistroEmpleoMostrarEmpresa($idperfil);
        require_once 'Vista/html/empleospostulacionempresa.php';
    }

    public function RegistrarEmpleoMostrarUsuarioID($idperfil) { // registro de persona
        $bdadmin = new UsuarioDAO();
        $bdregistrarempleo = new RegistroEmpleoDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdregistrarempleo->RegistroEmpleoBuscarUsuarioID($idperfil);
        require_once 'Vista/html/empleospostulacion.php';
    }

    public function RegistrarEmpleoAgregar($re_empleoFK, $re_usuarioFK, $idperfil) {
        $bdrempleo = new RegistroEmpleoDAO();
        date_default_timezone_set('America/Bogota');
        $hora = date("His");
        $fecha = date("Ymd");
        $url = "/IMAS/Empleos/";
        $servidor = $_SERVER['DOCUMENT_ROOT'] . $url;
        $foto = $_FILES['foto']['name'];
        $extension = pathinfo($foto, PATHINFO_EXTENSION);
        $nombre_foto = "EMPLEO" . $fecha . "F" . $hora . "." . $extension;
        $destino = $servidor . $nombre_foto; //RUTA DONDE SE ALAMCENA 
        $ruta = $_FILES['foto']['tmp_name'];
        $urlBD = $url . $nombre_foto;

        $cantidad = $bdrempleo->ContarEmpleo($re_usuarioFK, $re_empleoFK);
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Ya hizo registró a esta oferta de empleo","warning");';
            echo '}, 1000);</script>';
        } else {
            $registroempleo = new RegistroEmpleo(null, $re_usuarioFK, $re_empleoFK, $fecha, $urlBD);
            $bdrempleo->RegistroEmpleoGuardar($registroempleo);

            copy($ruta, $destino);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Registro Exitoso","success");';
            echo '}, 1000);</script>';
        }

        $this->RegistrarEmpleoMostrarUsuarioID($idperfil);
    }

    public function RegistrarEmpleoEliminar($id, $archivo, $idperfil) { // verifar la velidicacio
        $bdregistrarempleo = new RegistroEmpleoDAO();
        $borrarimagen = $_SERVER['DOCUMENT_ROOT'] . $archivo;

        $bdregistrarempleo->RegistroEmpleoEliminar($id);


        unlink($borrarimagen);

        // VALIDAR QUE NO ESTEN REGISTRADOS
        if ($archivo = "") {
            
        } else {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Elimado Exitosamente","success");';
            echo '}, 1000);</script>';
        }

        $this->RegistrarEmpleoMostrarUsuarioID($idperfil);
    }

}

?>