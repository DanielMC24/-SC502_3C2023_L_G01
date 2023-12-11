<?php

class ControladorRegistrarAyuda {

    public function RegistrarAyudaMostrar($idperfil) { // ADMNISTRADOR DE LAS EMPLESA
        $bdadmin = new UsuarioDAO();
        $bdregistrarayuda = new RegistroAyudaDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdregistrarayuda->RegistroAyudaMostrar();
        require_once 'Vista/html/ayudaspostulacion.php';
    }

    public function RegistrarAyudaMostrarEmpresa($idperfil) { // ADMNISTRADOR DE LAS EMPLESA
        $bdadmin = new UsuarioDAO();
        $bdregistrarayuda = new RegistroAyudaDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdregistrarayuda->RegistroAyudaMostrarEmpresa($idperfil);
        require_once 'Vista/html/ayudaspostulacionempresa.php';
    }

    
    public function RegistrarAyudaMostrarUsuarioID($idperfil) { // registro de persona
        $bdadmin = new UsuarioDAO();
        
        $bdregistrarayuda = new RegistroAyudaDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdregistrarayuda->RegistroAyudaBuscarUsuarioID($idperfil);
    
        require_once 'Vista/html/ayudaspostulacion.php';
    }
 
    public function RegistrarAyudaAgregar($ra_usuarioFK, $ra_ayudaFK , $ra_motivo, $idperfil) {
        $bdrayuda = new RegistroAyudaDAO();
        date_default_timezone_set('America/Bogota');
        $hora = date("His");
        $fecha = date("Y-m-d");
        $ra_fecharespuesta = date("Y-m-d",strtotime($fecha."+ 7 days"));
        $url = "/IMAS/Ayudas/";
        $servidor = $_SERVER['DOCUMENT_ROOT'] . $url;
        $foto = $_FILES['foto']['name'];
        $extension = pathinfo($foto, PATHINFO_EXTENSION);
        $nombre_foto = "AYUDA" . $fecha . "F" . $hora . "." . $extension;
        $destino = $servidor . $nombre_foto; //RUTA DONDE SE ALAMCENA 
        $ruta = $_FILES['foto']['tmp_name'];
        $urlBD = $url . $nombre_foto;

        $cantidad = $bdrayuda->ContarAyuda($ra_usuarioFK, $ra_ayudaFK);
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Ya hizo registró en esta empresa con este tipo de ayuda","warning");';
            echo '}, 1000);</script>';
        } else {
            $registroayuda = new RegistroAyuda(null, $ra_usuarioFK, $ra_ayudaFK, $ra_motivo, $ra_fecharespuesta, $urlBD);
            $bdrayuda->RegistroAyudaGuardar($registroayuda);

            copy($ruta, $destino);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Registro Exitoso","success");';
            echo '}, 1000);</script>';
        }

        $this->RegistrarAyudaMostrarUsuarioID($idperfil);
    }

    public function RegistrarAyudaEliminar($id, $archivo, $idperfil) { // verifar la velidicacio
        $bdregistrarayuda = new RegistroAyudaDAO();
        $borrarimagen = $_SERVER['DOCUMENT_ROOT'] . $archivo;

        $bdregistrarayuda->RegistroAyudaEliminar($id);


        unlink($borrarimagen);

        // VALIDAR QUE NO ESTEN REGISTRADOS
        if ($archivo = "") {
            
        } else {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Elimado Exitosamente","success");';
            echo '}, 1000);</script>';
        }

        $this->RegistrarAyudaMostrarUsuarioID($idperfil);
    }

}

?>