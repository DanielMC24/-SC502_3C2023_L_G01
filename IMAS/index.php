<?php

session_start();

require_once 'Configuracion/ConexionPDO.php';

require_once 'Modelo/Categoria.php';
require_once 'Modelo/CategoriaDAO.php';
require_once 'Controlador/ControladorCategoria.php';

$ControladorCategoria = new ControladorCategoria();


require_once 'Modelo/Curso.php';
require_once 'Modelo/CursoDAO.php';
require_once 'Controlador/ControladorCursos.php';

$ControladorCursos = new ControladorCursos();


require_once 'Modelo/Ayuda.php';
require_once 'Modelo/AyudaDAO.php';
require_once 'Controlador/ControladorAyuda.php';

$ControladorAyuda = new ControladorAyuda();


require_once 'Modelo/Empleo.php';
require_once 'Modelo/EmpleoDAO.php';
require_once 'Controlador/ControladorEmpleo.php';

$ControladorEmpleo = new ControladorEmpleo();


require_once 'Modelo/RegistroAyuda.php';
require_once 'Modelo/RegistroAyudaDAO.php';
require_once 'Controlador/ControladorRegistrarAyuda.php';

$ControladorRegistrarAyuda = new ControladorRegistrarAyuda();


require_once 'Modelo/RegistroEmpleo.php';
require_once 'Modelo/RegistroEmpleoDAO.php';
require_once 'Controlador/ControladorRegistrarEmpleo.php';

$ControladorRegistrarEmpleo = new ControladorRegistrarEmpleo();

require_once 'Modelo/RegistroAyuda.php';
require_once 'Modelo/RegistroAyudaDAO.php';
require_once 'Controlador/ControladorRegistrarAyuda.php';

$ControladorRegistrarAyuda = new ControladorRegistrarAyuda();

require_once 'Modelo/RegistroCurso.php';
require_once 'Modelo/RegistroCursoDAO.php';
require_once 'Controlador/ControladorRegistrarCurso.php';

$ControladorRegistrarCursos = new ControladorRegistrarCursos();


require_once 'Modelo/Usuario.php';
require_once 'Modelo/UsuarioDAO.php';

require_once 'Configuracion/Conexion.php';
require_once 'Controlador/ControladorPagina.php';
require_once 'Controlador/ControladorUsuario.php';

$ControladorPagina = new ControladorPagina();
$ControladorUsuario = new ControladorUsuario();


if (isset($_GET["accion"])) {

    if ($_GET["accion"] == "login") {
        $ControladorUsuario->Login($_POST["u_identificacion"], $_POST["u_contrasena"], $_POST["u_rol"]);
    } elseif ($_GET["accion"] == "index") {
        $ControladorPagina->Index();
    } elseif ($_GET["accion"] == "registrarme") {
        $ControladorUsuario->UsuarioAgregar($_POST["u_identificacion"], $_POST["u_nombresrazon"], $_POST["u_celular"], $_POST["u_correo"], $_POST["u_contrasena"], $_POST["u_rol"]);
    } elseif ($_GET["accion"] == "somos") {
        $ControladorPagina->verPagina('Vista/html/somos.php');
    } elseif ($_GET["accion"] == "mision") {
        $ControladorPagina->verPagina('Vista/html/mision.php');
    } elseif ($_GET["accion"] == "vision") {
        $ControladorPagina->verPagina('Vista/html/vision.php');
    }

    $idperfil = 0;
    if (isset($_SESSION['permitido']) == true) {
        $idperfil = $_SESSION['usuario'];
        // ACCESO DE ACUERDO AL RON 
        if ($_GET["accion"] == "inicio") {
            $ControladorUsuario->cargaInicio($idperfil);
        }


        // USUARIOS 
        if ($_GET["accion"] == "usuarios") {
            $ControladorUsuario->UsuariosMostrar($idperfil);
        } elseif ($_GET["accion"] == "usuarioactualizar") {
            $ControladorUsuario->UsuarioActualizar($_POST["u_id"], $_POST["u_identificacion"], $_POST["u_identificacionvieja"], $_POST["u_nombresrazon"], $_POST["u_celular"], $_POST["u_correo"], $_POST["u_contrasena"],  $_POST["u_rol"], $idperfil);
        } elseif ($_GET["accion"] == "reporteusuarios") {
            $ControladorUsuario->UsuariosReporte();
        }

        // CATEGORIA
        if ($_GET["accion"] == "categoria") {
            $ControladorCategoria->CategoriaMostrar($idperfil);
        } elseif ($_GET["accion"] == "categoriaguardar") {
            $ControladorCategoria->CategoriaAgregar($_POST["c_categoria"], $idperfil);
        } elseif ($_GET["accion"] == "categoriaactualizar") {
            $ControladorCategoria->CategoriaActualizar($_POST["c_id"], $_POST["c_categoria"], $_POST["c_categoriaviejo"], $idperfil);
        } elseif ($_GET["accion"] == "categoriaeliminar") {
            $ControladorCategoria->CategoriaEliminar($_POST["id"], $idperfil);
        }


        if ($_GET["accion"] == "cursos") {
            $ControladorCursos->CursoMostrar($idperfil);
        } elseif ($_GET["accion"] == "cursoguardar") {
            $ControladorCursos->CursosAgregar($_POST["cr_categoriaFK"], $_POST["cr_titulo"], $_POST["cr_descripcin"], $_POST["cr_horainicial"], $_POST["cr_horafinal"], $idperfil);
        } elseif ($_GET["accion"] == "cursoactualizar") {
            $ControladorCursos->CursosActualizar($_POST["cr_id"], $_POST["cr_categoriaFK"], $_POST["cr_titulo"], $_POST["cr_descripcion"], $_POST["cr_horainicial"], $_POST["cr_horafinal"], $_POST["fotovieja"], $idperfil);
        } elseif ($_GET["accion"] == "cursoeliminar") {
            $ControladorCursos->CursosEliminar($_POST["id"], $_POST["foto"], $idperfil);
        } elseif ($_GET["accion"] == "cursoscatalogo") {
            $ControladorCursos->CursoMostrarCatalogo($idperfil);
        } elseif ($_GET["accion"] == "reportecursos") {
            $ControladorCursos->CursosReporte();
        }

        // Ayuda
        if ($_GET["accion"] == "ayudas") {
            $ControladorAyuda->AyudaMostrar($idperfil);
        } elseif ($_GET["accion"] == "miayuda") {
            $ControladorAyuda->AyudaMostrarID($idperfil);
        } elseif ($_GET["accion"] == "ayudaguardar") {
            $ControladorAyuda->AyudaAgregar($_POST["a_empresaFK"], $_POST["a_tipoayuda"], $idperfil);
        } elseif ($_GET["accion"] == "ayudaactualizar") {
            $ControladorAyuda->AyudaActualizar($_POST["a_id"], $_POST["a_empresaFK"], $_POST["a_tipoayuda"], $_POST["a_tipoayudavieja"], $idperfil);
        } elseif ($_GET["accion"] == "ayudaeliminar") {
            $ControladorAyuda->AyudaEliminar($_POST["id"], $idperfil);
        }if ($_GET["accion"] == "ayudascatalogo") {
            $ControladorAyuda->AyudaMostrarCatalogo($idperfil);
        }

        // Empleos
        if ($_GET["accion"] == "empleos") {
            $ControladorEmpleo->EmpleoMostrar($idperfil);
        } elseif ($_GET["accion"] == "miempleo") {
            $ControladorEmpleo->EmpleoMostrarID($idperfil);
        } elseif ($_GET["accion"] == "empleoguardar") {
            $ControladorEmpleo->EmpleoAgregar($_POST["e_empresaFK"], $_POST["e_nombre"], $_POST["e_requisitos"], $idperfil);
        } elseif ($_GET["accion"] == "empleoactualizar") {
            $ControladorEmpleo->EmpleoActualizar($_POST["e_id"], $_POST["e_empresaFK"], $_POST["e_nombre"], $_POST["e_nombreviejo"], $_POST["e_requisitos"], $idperfil);
        } elseif ($_GET["accion"] == "empleoeliminar") {
            $ControladorEmpleo->EmpleoEliminar($_POST["id"], $idperfil);
        }if ($_GET["accion"] == "empleoscatalogo") {
            $ControladorEmpleo->EmpleoMostrarCatalogo($idperfil);
        }

        if ($_GET["accion"] == "postulacionempleos") {
            $ControladorRegistrarEmpleo->RegistrarEmpleoMostrarUsuarioID($idperfil);
        } elseif ($_GET["accion"] == "registroempleo") {
            $ControladorRegistrarEmpleo->RegistrarEmpleoAgregar($_POST["re_empleoFK"], $_POST["re_usuarioFK"], $idperfil);
        } elseif ($_GET["accion"] == "registroempleoeliminar") {
            $ControladorRegistrarEmpleo->RegistrarEmpleoEliminar($_POST["id"], $_POST["foto"], $idperfil);
        } elseif ($_GET["accion"] == "postulacionempleosempresa") {
            $ControladorRegistrarEmpleo->RegistrarEmpleoMostrarEmpresa($idperfil);
        }

        if ($_GET["accion"] == "postulacionayudas") {
            $ControladorRegistrarAyuda->RegistrarAyudaMostrarUsuarioID($idperfil);
        } elseif ($_GET["accion"] == "registroayuda") {
            $ControladorRegistrarAyuda->RegistrarAyudaAgregar($_POST["ra_ayudaFK"], $_POST["ra_usuarioFK"], $_POST["ra_motivo"], $idperfil);
        } elseif ($_GET["accion"] == "registroayudaeliminar") {
            $ControladorRegistrarAyuda->RegistrarAyudaEliminar($_POST["id"], $_POST["foto"], $idperfil);
        } elseif ($_GET["accion"] == "postulacionayudasempresa") {
            $ControladorRegistrarAyuda->RegistrarAyudaMostrarEmpresa($idperfil);
        }


        if ($_GET["accion"] == "postulacioncursos") {
            $ControladorRegistrarCursos->RegistrarCursosMostrarUsuarioID($idperfil);
        } elseif ($_GET["accion"] == "registrocurso") {
            $ControladorRegistrarCursos->RegistrarCursosAgregar($_POST["rc_cursoFK"], $_POST["rc_usuarioFK"], $idperfil);
        } elseif ($_GET["accion"] == "registrocursoeliminar") {
            $ControladorRegistrarCursos->RegistrarCursosEliminar($_POST["id"], $idperfil);
        } elseif ($_GET["accion"] == "reportecursosempresa") {
            $ControladorRegistrarCursos->RegistrarCursosMostrarEmpresa($idperfil);
        } elseif ($_GET["accion"] == "cursospostulacion") {
            $ControladorRegistrarCursos->RegistrarCursosPostuladosAdmin($_GET["idcurso"], $idperfil);
        }

        if ($_GET["accion"] == "salir") {
            $_SESSION = array();  //Destruir todas las variables de sesi�n que hallan sido 
            session_destroy();
            $ControladorPagina->Index();
        }
    } else {
        $_SESSION = array();  //Destruir todas las variables de sesi�n que hallan sido 
        session_destroy();
    }
} else {

    $ControladorPagina->Index();
}
?>
