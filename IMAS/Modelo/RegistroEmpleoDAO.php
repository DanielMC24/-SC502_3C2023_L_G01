<?php

class RegistroEmpleoDAO {

    public function RegistroEmpleoMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registroempleo, empleos, usuarios WHERE re_empleoFK = e_id AND re_usuarioFK = u_id ORDER BY re_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
    public function RegistroEmpleoMostrarEmpresa($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registroempleo, empleos, usuarios WHERE re_empleoFK = e_id AND re_usuarioFK = u_id AND e_usuarioFK = $id ORDER BY re_id ASC;;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }
     public function ContarEmpleo($id, $empleo) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registroempleo WHERE re_empleoFK = '$empleo' AND re_usuarioFK = '$id';";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function RegistroEmpleoBuscarUsuarioID($id) { // mis empleos
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registroempleo, empleos, usuarios WHERE re_empleoFK = e_id AND re_usuarioFK = $id AND u_id = $id ORDER BY re_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    

    public function RegistroEmpleoGuardar(RegistroEmpleo $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $re_id = $dato->getRe_id();
        $re_usuarioFK = $dato->getRe_usuarioFK();
        $re_empleoFK = $dato->getRe_empleoFK();
        $re_fecha = $dato->getRe_fecha();
        $re_cv = $dato->getRe_cv();
        $sql = "INSERT INTO registroempleo VALUES (null, '$re_usuarioFK', '$re_empleoFK', '$re_fecha', '$re_cv'); ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

 
    public function RegistroEmpleoEliminar($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "DELETE FROM registroempleo WHERE re_id = $id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

}
