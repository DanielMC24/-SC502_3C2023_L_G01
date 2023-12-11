<?php

class ControladorEmpleo {

    public function EmpleoMostrar($idperfil) {
        $bdadmin = new UsuarioDAO();
        $bdempleo = new EmpleoDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdempleo->EmpleoMostrar();
        require_once 'Vista/html/empleos.php';
    }

    public function EmpleoMostrarCatalogo($idperfil) {
        $bdadmin = new UsuarioDAO();
        $bdempleo = new EmpleoDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdempleo->EmpleoMostrar();
        require_once 'Vista/html/empleoscatalogo.php';
    }
    
    public function EmpleoMostrarID($idperfil) {
        $bdadmin = new UsuarioDAO();
        $bdempleo = new EmpleoDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdempleo->EmpleoBuscarID($idperfil);
        require_once 'Vista/html/empleomio.php';
    }

    public function EmpleoAgregar($a_empresaFK, $e_nombre, $e_requisitos, $idperfil) {
        $bdempleo = new EmpleoDAO();
        $cantidad = $bdempleo->BuscarEmpleo($a_empresaFK, strtoupper($e_nombre));
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Su registra ya esta con ese nombre de empleo","warning");';
            echo '}, 1000);</script>';
        } else {
            $guardar = new Empleo(null, $a_empresaFK, strtoupper($e_nombre), $e_requisitos);
            $bdempleo->EmpleoGuardar($guardar);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Registrado","success");';
            echo '}, 1000);</script>';
        }
        $this->EmpleoMostrarID($idperfil);
    }

    public function EmpleoActualizar($e_id, $a_empresaFK, $e_nombre, $e_nombreviejo, $e_requisitos, $idperfil) {
        $bdempleo = new EmpleoDAO();

        if (strtoupper($e_nombre) != strtoupper($e_nombreviejo)) {
            $cantidad = $bdempleo->BuscarEmpleo($a_empresaFK, strtoupper($e_nombre));
            if ($cantidad != 0) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Su registra ya esta con ese nombre de empleo","warning");';
                echo '}, 1000);</script>';
            } else {
                $actualizar = new Empleo($e_id, $a_empresaFK, strtoupper($e_nombre), $e_requisitos);
                $bdempleo->EmpleoActualizar($actualizar);
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Dato Actualizado","success");';
                echo '}, 1000);</script>';
            }
        } else {
            $actualizar = new Empleo($e_id, $a_empresaFK, strtoupper($e_nombreviejo), $e_requisitos);
            $bdempleo->EmpleoActualizar($actualizar);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Actualizado","success");';
            echo '}, 1000);</script>';
        }

        $this->EmpleoMostrarID($idperfil);
    }

    public function EmpleoEliminar($id, $idperfil) { // verifar la velidicacio
        $bdempleo = new EmpleoDAO();
        $cantidad = $bdempleo->EmpleoBuscarRegistro($id);
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Contiene Registro en Empleos de Clientes","warning");';
            echo '}, 1000);</script>';
        } else {
            $bdempleo->EmpleoEliminar($id);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Elminado","success");';
            echo '}, 1000);</script>';
        }
        $this->EmpleoMostrarID($idperfil);
    }

}

?>