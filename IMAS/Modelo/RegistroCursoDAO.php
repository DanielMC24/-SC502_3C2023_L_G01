<?php

class RegistroCursoDAO {

    public function RegistroCursoMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registrocurso, cursos, usuarios WHERE rc_cursoFK = cr_id AND rc_usuarioFK = u_id ORDER BY rc_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
    public function RegistroCursoPostuladosMostrar($idcurso) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registrocurso, cursos, usuarios WHERE rc_cursoFK = $idcurso AND cr_id = $idcurso AND rc_usuarioFK = u_id ORDER BY rc_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
     public function ContarCurso($id, $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registrocurso WHERE rc_cursoFK = '$dato' AND rc_usuarioFK = '$id';";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function RegistroCursoBuscarUsuarioID($id) { // mis empleos
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registrocurso, cursos, usuarios WHERE rc_cursoFK = cr_id AND rc_usuarioFK = $id AND u_id = $id ORDER BY rc_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    

    public function RegistroCursoGuardar(RegistroCurso $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $rc_id = $dato->getRc_id();
        $rc_usuarioFK = $dato->getRc_usuarioFK();
        $rc_cursoFK = $dato->getRc_cursoFK();
        $sql = "INSERT INTO registrocurso VALUES (null, '$rc_usuarioFK', '$rc_cursoFK'); ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

 
    public function RegistroCursoEliminar($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "DELETE FROM registrocurso WHERE rc_id = $id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

}
