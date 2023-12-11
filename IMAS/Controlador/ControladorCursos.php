<?php

Class ControladorCursos {

    // CURSOS
    public function CursoMostrar($idperfil) {
        $bdusario = new UsuarioDAO();
        $bdcursos = new CursoDAO();
        $bdcategoria = new CategoriaDAO();
        $perfilusuario = $bdusario->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdcursos->CursoMostrar();
        $mostrarcategoria = $bdcategoria->CategoriaMostrar();
        $mostrarcategoriaup = $bdcategoria->CategoriaMostrar();

        require_once 'Vista/html/cursos.php';
    }

    public function CursoMostrarCatalogo($idperfil) {
        $bdusario = new UsuarioDAO();
        $bdcursos = new CursoDAO();
        $bdcategoria = new CategoriaDAO();
        $perfilusuario = $bdusario->UsuarioBuscarID($idperfil);
        $mostrarinformacion = $bdcursos->CursoMostrar();
        $mostrarcategoria = $bdcategoria->CategoriaMostrar();
        $mostrarcategoriaup = $bdcategoria->CategoriaMostrar();

        require_once 'Vista/html/cursoscatalogo.php';
    }

    public function CursosReporte() {
        $bdcurso = new CursoDAO();
        $mostrarinformacion = $bdcurso->CursoMostrar();
        require_once 'Vista/html/reportecurso.php';
    }

    public function cursoCatalogo() {
        $bdcurso = new CursosDAO();
        $bdth = new TipoCursosDAO();
        $bdempresa = new EmpresaDAO();
        $mostrarinformacion = $bdcurso->CursosMostrar();
        $mostrartipo = $bdth->THMostrar();
        $mostrarempresa = $bdempresa->EmpresaMostrar();
        require_once 'Vista/html/cursoes.php';
    }

    public function cursoCatalogoPrecio($precio) {
        $bdcurso = new CursosDAO();
        $bdth = new TipoCursosDAO();
        $bdempresa = new EmpresaDAO();
        $mostrarinformacion = null;
        if ($precio == 'Menor a Mayor Precio') {
            $mostrarinformacion = $bdcurso->CursosMostrarMayor();
        } else {
            $mostrarinformacion = $bdcurso->CursosMostrarMenor();
        }

        $mostrartipo = $bdth->THMostrar();
        $mostrarempresa = $bdempresa->EmpresaMostrar();
        require_once 'Vista/html/cursoes.php';
    }

    public function cursoCatalogoTipo($id) {
        $bdcurso = new CursosDAO();
        $bdth = new TipoCursosDAO();
        $bdempresa = new EmpresaDAO();

        $mostrarinformacion = $bdcurso->CursosMostrarTipo($id);

        $mostrartipo = $bdth->THMostrar();
        $mostrarempresa = $bdempresa->EmpresaMostrar();
        require_once 'Vista/html/cursoes.php';
    }

    public function cursoCatalogoEstadia($estadia) {
        $bdcurso = new CursosDAO();
        $bdth = new TipoCursosDAO();
        $bdempresa = new EmpresaDAO();

        $mostrarinformacion = $bdcurso->CursosMostrarEstadia($estadia);

        $mostrartipo = $bdth->THMostrar();
        $mostrarempresa = $bdempresa->EmpresaMostrar();
        require_once 'Vista/html/cursoes.php';
    }

    public function Vercurso($numero) {
        $bdcurso = new CursosDAO();
        $bdempresa = new EmpresaDAO();
        $mostrarinformacion = $bdcurso->CursosCatalogoID($numero);
        $mostrarempresa = $bdempresa->EmpresaMostrar();
        require_once 'Vista/html/vercurso.php';
    }

    public function VerReserva($hbitacion, $fecha, $horallegada, $horasalida) {
        $bdcurso = new CursosDAO();
        $bdempresa = new EmpresaDAO();

        $mostrarinformacion = $bdcurso->CursosCatalogoID($hbitacion);
        $mostrarfecha = $fecha;
        $mostrarHLL = $horallegada;
        $mostrarHS = $horasalida;

        $mostrarempresa = $bdempresa->EmpresaMostrar();

        require_once 'Vista/html/reservar.php';
    }

    public function VerDisponiblidad($hbitacion, $tipo, $fecha, $horallegada, $horasalida) {
        $bdreserva = new ReservacionDAO();
        $bdempresa = new EmpresaDAO();

        if ($tipo == 'Hora') {

            $hora1 = strtotime($horallegada);
            $hora2 = strtotime($horasalida);
            if ($hora1 > $hora2 || $hora1 == $hora2) {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "La hora Inicial no puede ser mayor o igual que la Hora Final","warning");';
                echo '}, 1000);</script>';
                $bdcurso = new CursosDAO();
                $mostrarinformacion = $bdcurso->CursosCatalogoID($hbitacion);

                $mostrarempresa = $bdempresa->EmpresaMostrar();

                require_once 'Vista/html/vercurso.php';
            } else {

                $resultcant = $bdreserva->BuscarReservacionHora($hbitacion, $fecha, $horallegada, $horasalida);
                $cantidad = $resultcant->num_rows;

                if ($cantidad == 0) {
                    $this->VerReserva($hbitacion, $fecha, $horallegada, $horasalida);
                } else {
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal("Información!", "Ya esta reservada para esta fecha y hora","warning");';
                    echo '}, 1000);</script>';
                    $bdcurso = new CursosDAO();
                    $mostrarinformacion = $bdcurso->CursosCatalogoID($hbitacion);

                    $mostrarempresa = $bdempresa->EmpresaMostrar();

                    require_once 'Vista/html/vercurso.php';
                }
            }
        } else {

            $resultcant = $bdreserva->BuscarReservacionHora($hbitacion, $fecha, $horallegada, $horasalida);
            $cantidad = $resultcant->num_rows;

            if ($cantidad == 0) {

                $this->VerReserva($hbitacion, $fecha, $horallegada, $horasalida);
            } else {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Ya esta reservada para esta fecha y hora","warning");';
                echo '}, 1000);</script>';
                $bdcurso = new CursosDAO();
                $mostrarinformacion = $bdcurso->CursosCatalogoID($hbitacion);
                $mostrarempresa = $bdempresa->EmpresaMostrar();

                require_once 'Vista/html/vercurso.php';
            }
        }
    }

    public function CursosAgregar($cr_categoriaFK, $cr_titulo, $cr_descripcion, $cr_horainicial, $cr_horafinal, $idperfil) {
        $bdcurso = new CursoDAO();
        date_default_timezone_set('America/Bogota');
        $hora = date("His");
        $fecha = date("Ymd");
        $url = "/IMAS/Cursos/";
        $servidor = $_SERVER['DOCUMENT_ROOT'] . $url;
        $foto = $_FILES['foto']['name'];
        $extension = pathinfo($foto, PATHINFO_EXTENSION);
        $nombre_foto = "CURSO" . $fecha . "F" . $hora . "." . $extension;
        $destino = $servidor . $nombre_foto; //RUTA DONDE SE ALAMCENA 
        $ruta = $_FILES['foto']['tmp_name'];
        $urlBD = $url . $nombre_foto;
        $curso = new Curso(null, $cr_categoriaFK, $cr_titulo, $cr_descripcion, $cr_horainicial, $cr_horafinal, $urlBD);
        $bdcurso->CursoGuardar($curso);

        copy($ruta, $destino);

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Información!", "Dato Registrado","success");';
        echo '}, 1000);</script>';

        $this->cursoMostrar($idperfil);
    }

    public function CursosActualizar($cr_id, $cr_categoriaFK, $cr_titulo, $cr_descripcion, $cr_horainicial, $cr_horafinal, $fotovieja, $idperfil) {

        $bdcurso = new CursoDAO();
        date_default_timezone_set('America/Bogota');
        $hora = date("His");
        $fecha = date("Ymd");
        $url = "/IMAS/Cursos/";
        $servidor = $_SERVER['DOCUMENT_ROOT'] . $url;

        $foto = $_FILES['foto']['name'];
        $extension = pathinfo($foto, PATHINFO_EXTENSION);


        if ($foto != "") { // buscar curso y actualizar con nueva imagen
            $extension = pathinfo($foto, PATHINFO_EXTENSION);
            $nombre_foto = "CURSO" . $fecha . "F" . $hora . "." . $extension;
            $destino = $servidor . $nombre_foto; //RUTA DONDE SE ALAMCENA 
            $ruta = $_FILES['foto']['tmp_name'];
            $urlBD = $url . $nombre_foto;

            copy($ruta, $destino);


            $curso = new Curso($cr_id, $cr_categoriaFK, $cr_titulo, $cr_descripcion, $cr_horainicial, $cr_horafinal, $urlBD);
            $bdcurso->CursoActualizar($curso);

            if ($fotovieja == "") {
                
            } else {
                $borrarimagen = $_SERVER['DOCUMENT_ROOT'] . $fotovieja;
                unlink($borrarimagen);
            }

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Actualizado con imagen Nueva","success");';
            echo '}, 1000);</script>';
        } else {// actualizar son foto      
            $curso = new Curso($cr_id, $cr_categoriaFK, $cr_titulo, $cr_descripcion, $cr_horainicial, $cr_horafinal, $fotovieja);
            $bdcurso->CursoActualizar($curso);
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Dato Actualizado Normalmente","success");';
            echo '}, 1000);</script>';
        }
        $this->cursoMostrar($idperfil);
    }

    public function CursosEliminar($id, $foto, $idperfil) {
        $bdcurso = new CursoDAO();
        $cantidad = $bdcurso->ContarRegistroCurso($id);
        if ($cantidad != 0) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Información!", "Contiene Registros de cliente en cursos","warning");';
            echo '}, 1000);</script>';
        } else {
            $borrarimagen = $_SERVER['DOCUMENT_ROOT'] . $foto;
            unlink($borrarimagen);
            $bdcurso->CursoElimninar($id);
            if ($foto = "") {
                
            } else {
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Información!", "Dato Elimado Exitosamente","success");';
                echo '}, 1000);</script>';
            }
        }

        $this->cursoMostrar($idperfil);
    }

}

?>