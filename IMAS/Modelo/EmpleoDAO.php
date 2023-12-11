<?php

class EmpleoDAO {

    public function EmpleoMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM empleos, usuarios WHERE e_usuarioFK = u_id ORDER BY e_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function EmpleoBuscarID($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM empleos, usuarios WHERE e_usuarioFK = '$id' AND u_id = '$id' ORDER BY e_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function BuscarEmpleo($id, $dato) { // buscar si ya la aydua esta registarad
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM empleos WHERE e_usuarioFK = $id AND e_nombre = '$dato' ";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function EmpleoBuscarRegistro($id) { // para eliminar el registro
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registroempleo WHERE re_empleoFK = $id ";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function EmpleoGuardar(Empleo $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $e_id = $dato->getE_id();
        $e_usuarioFK = $dato->getA_empresaFK();
        $e_nombre = $dato->getE_nombre();
        $e_requisitos = $dato->getE_requisitos();
        $sql = "INSERT INTO empleos VALUES (null, '$e_usuarioFK', '$e_nombre', '$e_requisitos'); ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function EmpleoActualizar(Empleo $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $e_id = $dato->getE_id();
        $e_usuarioFK = $dato->getA_empresaFK();
        $e_nombre = $dato->getE_nombre();
        $e_requisitos = $dato->getE_requisitos();
        $sql = "UPDATE empleos SET e_usuarioFK = '$e_usuarioFK', e_nombre = '$e_nombre', e_requisitos = '$e_requisitos' WHERE e_id = '$e_id'; ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function EmpleoEliminar($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "DELETE FROM empleos WHERE e_id = $id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

}
