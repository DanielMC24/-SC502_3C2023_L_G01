<?php

class CursoDAO {

    public function CursoMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM cursos, categorias WHERE c_id = cr_categoriaFK ORDER BY cr_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
    public function ContarRegistroCurso($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registrocurso WHERE rc_cursoFK = $id;";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
    public function CursoMostrarCategoria($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM cursos, categorias WHERE c_id = '$id' AND cr_categoriaFK = '$id' ORDER BY cr_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function CursoGuardar(Curso $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $cr_id = $dato->getCr_id();
        $cr_categoriaFK = $dato->getCr_categoriaFK();
        $cr_titulo = strtoupper($dato->getCr_titulo());
        $cr_descripcion = $dato->getCr_descripcion();
        $cr_horainicial = $dato->getCr_horainicial();
        $cr_horafinal = $dato->getCr_horafinal();
        $cr_foto = $dato->getCr_foto();
        $sql = "INSERT INTO cursos VALUES (null, '$cr_categoriaFK', '$cr_titulo', '$cr_descripcion', '$cr_horainicial', '$cr_horafinal', '$cr_foto') ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function CursoBuscarID($id) {        
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM cursos WHERE cr_id = $id ";
        $resultado = $conexion->consultarRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function CursoActualizar(Curso $dato) {
        
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $cr_id = $dato->getCr_id();
        $cr_categoriaFK = $dato->getCr_categoriaFK();
        $cr_titulo = strtoupper($dato->getCr_titulo());

        $cr_descripcion = $dato->getCr_descripcion();
        $cr_horainicial = $dato->getCr_horainicial();
        $cr_horafinal = $dato->getCr_horafinal();
        $cr_foto = $dato->getCr_foto();

        $sql = "UPDATE cursos SET cr_categoriaFK = '$cr_categoriaFK',  cr_titulo = '$cr_titulo', cr_descripcion = '$cr_descripcion', cr_horainicial= '$cr_horainicial', cr_horafinal = '$cr_horafinal', cr_foto = '$cr_foto' WHERE cr_id = $cr_id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;

    }

    public function CursoElimninar($id) {
        
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "DELETE FROM cursos WHERE cr_id = $id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
        
    }

}

?>