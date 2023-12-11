<?php

class EmpresaDAO {

    public function EmpresaMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM empresa WHERE e_id = 1";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function EmpresaActualizar(Empresa $dato) {

        $conexion = new Conexion();
        $conexion->abrir();

        $e_id = $dato->getE_id();
        $e_nit = $dato->getE_nit();
        $e_razonsocial = $dato->getE_razonsocial();
        $e_direccion = $dato->getE_direccion();
        $e_correo = $dato->getE_correo();
        $e_nequi = $dato->getE_nequi();
        $e_bancolombia = $dato->getE_bancolombia();
        $e_daviplata = $dato->getE_daviplata();
        $e_whatsaap = $dato->getE_whatsaap();

        $sql = "UPDATE empresa SET e_nit= '$e_nit', e_razonsocial = '$e_razonsocial', e_direccion = '$e_direccion',"
                . " e_correo = '$e_correo', e_nequi = '$e_nequi', e_bancolombia = '$e_bancolombia', e_daviplata = '$e_daviplata', e_whatsaap = '$e_whatsaap' WHERE e_id = $e_id ";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }

}

?>