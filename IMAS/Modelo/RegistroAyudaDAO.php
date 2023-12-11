<?php

class RegistroAyudaDAO {

    public function RegistroAyudaMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registroayuda, ayudas, usuarios WHERE ra_ayudaFK = a_id AND ra_usuarioFK = u_id ORDER BY ra_id DESC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function RegistroAyudaMostrarEmpresa($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registroayuda, ayudas, usuarios WHERE ra_ayudaFK = a_id AND ra_usuarioFK = u_id AND a_usuarioFK = $id ORDER BY ra_id DESC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function ContarAyuda($id, $ayuda) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registroayuda WHERE ra_ayudaFK = '$ayuda' AND ra_usuarioFK = '$id';";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function RegistroAyudaBuscarUsuarioID($id) { // BUSCAR MIS AYUDAS
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM registroayuda, ayudas, usuarios WHERE ra_ayudaFK = a_id AND ra_usuarioFK = $id AND u_id = $id ORDER BY ra_id DESC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function RegistroAyudaGuardar(RegistroAyuda $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();

        $ra_id = $dato->getRa_id();
        $ra_usuarioFK = $dato->getRa_usuarioFK();
        $ra_ayudaFK = $dato->getRa_ayudaFK();
        $ra_motivo = $dato->getRa_motivo();
        $ra_fecha = $dato->getRa_fecha();
        $ra_evidencia = $dato->getRa_evidencia();
        $sql = "INSERT INTO registroayuda VALUES (null, '$ra_usuarioFK', '$ra_ayudaFK', '$ra_motivo', '$ra_fecha', '$ra_evidencia'); ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function RegistroAyudaEliminar($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "DELETE FROM registroayuda WHERE ra_id = $id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;
    }

}
