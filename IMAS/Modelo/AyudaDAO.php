<?php

class AyudaDAO {

    public function AyudaMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
         $sql = "SELECT * FROM ayudas, usuarios WHERE a_usuarioFK = u_id ORDER BY a_id;";

        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
    public function AyudaBuscarID($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM ayudas, usuarios WHERE a_usuarioFK = $id AND u_id = $id ORDER BY a_id;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function BuscarAyuda($id, $dato) { // buscar si ya la aydua esta registarad
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM ayudas WHERE a_usuarioFK = $id AND a_tipoayuda = '$dato' ";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    
    public function AyudaBuscarRegistro($id) { // para eliminar
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registroayuda WHERE ra_ayudaFK  = $id ";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function AyudaGuardar(Ayuda $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $a_id = $dato->getA_id();
        $a_empresaFK = $dato->getA_empresaFK();
        $a_tipoayuda = $dato->getA_tipoayuda();
        $sql = "INSERT INTO ayudas VALUES (null, '$a_empresaFK', '$a_tipoayuda'); ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    

    public function AyudaActualizar(Ayuda $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $a_id = $dato->getA_id();
        $a_empresaFK = $dato->getA_empresaFK();
        $a_tipoayuda = $dato->getA_tipoayuda();
        $sql = "UPDATE ayudas SET a_usuarioFK = '$a_empresaFK', a_tipoayuda = '$a_tipoayuda' WHERE a_id = '$a_id'; ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function AyudaEliminar($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "DELETE FROM ayudas WHERE a_id = $id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

}
