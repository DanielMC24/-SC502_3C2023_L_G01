<?php

Class ControladorUsuario {

    public function UsuariosMostrar($idperfil) {
        $bdadmin = new UsuarioDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdadmin->UsuariosMostrar();
        require_once 'Vista/html/usuarios.php';
    }

    public function UsuariosReporte() {
        $bdadmin = new UsuarioDAO();
        $mostrarinformacion = $bdadmin->UsuariosMostrar();
        require_once 'Vista/html/reporteusuario.php';
    }

    public function cargaInicio($id) {
        $bdusuario = new UsuarioDAO();
        $perfilusuario = $bdusuario->UsuarioBuscarID($id);
        require_once 'Vista/html/inicio.php';
    }

    public function Login($dni, $contrasena, $rol) {

        $bdusuario = new UsuarioDAO();

        $cantidad = $bdusuario->UsuarioLogin($dni, $contrasena, $rol);

        if ($cantidad == 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Usuario y Contrasena Incorrectos","warning");';
            echo '}, 1000);</script>';
            require_once 'Vista/html/index.php';
        } else {
            $buscar = $bdusuario->ConsultarLogin($dni, $contrasena, $rol);
            $perfild = $buscar->fetch(PDO::FETCH_ASSOC);
            $id = $perfild["u_id"];
            $_SESSION['permitido'] = true;
            $_SESSION['usuario'] = $id;
            $perfilusuario = $bdusuario->UsuarioBuscarID($_SESSION['usuario']);
            require_once 'Vista/html/inicio.php';
            //}
        }
    }

    public function UsuarioActualizar($u_id, $u_identificacion, $u_identificacionvieja, $u_nombresrazon, $u_celular, $u_correo, $u_contrasena, $u_rol, $idperfil) {
        $bdusuario = new UsuarioDAO();

        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d H:i:s");
        if ($u_identificacion == $u_identificacionvieja) {
            $guardar = new Usuario($u_id, $u_identificacionvieja, $u_nombresrazon, $u_celular, $u_correo, $u_contrasena, null);
            $bdusuario->UsuarioActualizar($guardar);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Actualizado","success");';
            echo '}, 1000);</script>';
        } else {
            $bdusuario = new UsuarioDAO();
            $cantidad = $bdusuario->Contarusuario($u_identificacion, $u_rol);
            if ($cantidad != 0) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Ya esta registrado en el sistema","warning");';
                echo '}, 1000);</script>';
            } else {
                $guardar = new Usuario($u_id, $u_identificacion, $u_nombresrazon, $u_celular, $u_correo, $u_contrasena, $u_rol);
                $bdusuario->UsuarioActualizar($guardar);
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Dato Actualizados con identificacion nueva","success");';
                echo '}, 1000);</script>';
            }
        }
        $this->cargaInicio($idperfil);
    }

    public function UsuarioAgregar($u_identificacion, $u_nombresrazon, $u_celular, $u_correo, $u_contrasena, $u_rol) {

        $bdusuario = new UsuarioDAO();
        $cantidad = $bdusuario->Contarusuario($u_identificacion, $u_rol);
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Ya esta registrado en el sistema","warning");';
            echo '}, 1000);</script>';
        } else {
            $guardar = new Usuario(null, $u_identificacion, $u_nombresrazon, $u_celular, $u_correo, $u_contrasena, $u_rol);
            $bdusuario->UsuarioRegistrar($guardar);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Registrado, inicie sesion","success");';
            echo '}, 1000);</script>';
        }
        require_once 'Vista/html/index.php';
    }

}

?>
