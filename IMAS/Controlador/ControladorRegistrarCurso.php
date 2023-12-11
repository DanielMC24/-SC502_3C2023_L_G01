<?php

class ControladorRegistrarCursos {

    public function RegistrarCursosMostrar($idperfil) { // ADMNISTRADOR DE LAS EMPLESA
        $bdadmin = new UsuarioDAO();
        $bdregistrarcurso = new RegistroCursoDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdregistrarcurso->RegistroCursoMostrar();
        require_once 'Vista/html/cursospostulacion.php';
    }
    
     public function RegistrarCursosMostrarEmpresa($idperfil) { // ADMNISTRADOR DE LAS EMPLESA
        $bdadmin = new UsuarioDAO();
        $bdregistrarcurso = new RegistroCursoDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdregistrarcurso->RegistroCursoMostrar();
        require_once 'Vista/html/cursosreportepostulados.php';
    }

     public function RegistrarCursosPostulados($idcurso, $idperfil) { // ADMNISTRADOR DE LAS EMPLESA
        $bdadmin = new UsuarioDAO();
        $bdregistrarcurso = new RegistroCursoDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdregistrarcurso->RegistroCursoPostuladosMostrar($idcurso);
        require_once 'Vista/html/cursospostulacion.php';
    }
    
      public function RegistrarCursosPostuladosAdmin($idcurso, $idperfil) { // ADMNISTRADOR DE LAS EMPLESA
        $bdadmin = new UsuarioDAO();
        $bdregistrarcurso = new RegistroCursoDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdregistrarcurso->RegistroCursoPostuladosMostrar($idcurso);
        require_once 'Vista/html/cursospostulacionadmin.php';
    }
    
    public function RegistrarCursosMostrarUsuarioID($idperfil) { // registro de persona
        $bdadmin = new UsuarioDAO();
        $bdregistrarcurso = new RegistroCursoDAO();
        $perfilusuario = $bdadmin->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdregistrarcurso->RegistroCursoBuscarUsuarioID($idperfil);
        require_once 'Vista/html/cursospostulacion.php';
    }

    public function RegistrarCursosAgregar($rc_cursoFK, $rc_usuarioFK, $idperfil) {
        $bdrcurso = new RegistroCursoDAO();
        date_default_timezone_set('America/Bogota');
        $hora = date("His");
        $fecha = date("Ymd");
        $cantidad = $bdrcurso->ContarCurso($rc_usuarioFK, $rc_cursoFK);
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Ya se registró en este curso","warning");';
            echo '}, 1000);</script>';
        } else {
            $registro = new RegistroCurso(null, $rc_usuarioFK, $rc_cursoFK);
            $bdrcurso->RegistroCursoGuardar($registro);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Registro Exitoso","success");';
            echo '}, 1000);</script>';
        }

        $this->RegistrarCursosMostrarUsuarioID($idperfil);
    }

    public function RegistrarCursosEliminar($id, $idperfil) { // verifar la velidicacio
        $bdregistrarcurso = new RegistroCursoDAO();
        $bdregistrarcurso->RegistroCursoEliminar($id);
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Información!", "Dato Elimado Exitosamente","success");';
        echo '}, 1000);</script>';
        $this->RegistrarCursosMostrarUsuarioID($idperfil);
    }

}

?>