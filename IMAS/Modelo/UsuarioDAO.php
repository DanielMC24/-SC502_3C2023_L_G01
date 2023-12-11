<?php

class UsuarioDAO {

    public function UsuariosMostrar() {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM usuarios ORDER BY u_id ASC;";
        $resultado = $conexion->obtenerTodos($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    
    public function UsuarioLogin($usu, $contr, $rol) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM usuarios WHERE u_identificacion = '$usu' AND u_contrasena = '$contr' AND u_rol = '$rol' ";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
     public function Contarusuario($identificacion, $rol) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM usuarios WHERE u_identificacion = '$identificacion' AND u_rol = '$rol' ";
        $resultado = $conexion->CantidadRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }
    
     public function ConsultarLogin($usu, $contr, $rol) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM usuarios WHERE u_identificacion = '$usu' AND u_contrasena = '$contr' AND u_rol = '$rol'";
        $resultado = $conexion->consultarRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }

    public function UsuarioBuscarID($id) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $sql = "SELECT * FROM usuarios WHERE u_id = $id ";
        $resultado = $conexion->consultarRegistro($sql);
        $conexion->Desconectar();
        return $resultado;
    }


    
    public function UsuarioRegistrar(Usuario $dato) {
        $conexion = new ConexionPDO();
        $conexion->Conectar();
        $u_id  = $dato->getU_id();
        $u_identificacion = $dato->getU_identificacion();
        $u_nombresrazon = strtoupper($dato->getU_nombrerazon());
        $u_celular = $dato->getU_celular();
        $u_correo = strtolower($dato->getU_correo());
        $u_contrasena = $dato->getU_contrasena();
        $u_rol = $dato->getU_rol();
        $sql = "INSERT INTO usuarios VALUES (null, '$u_identificacion', '$u_nombresrazon', '$u_celular', '$u_correo', '$u_contrasena', '$u_rol'); ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;

 
    }
    
       public function UsuarioActualizar(Usuario $dato) {

         $conexion = new ConexionPDO();
        $conexion->Conectar();
        $u_id  = $dato->getU_id();
        $u_identificacion = $dato->getU_identificacion();
        $u_nombresrazon = strtoupper($dato->getU_nombrerazon());
        $u_celular = $dato->getU_celular();
        $u_correo = strtolower($dato->getU_correo());
        $u_contrasena = $dato->getU_contrasena();
        $u_rol = $dato->getU_rol();
        $sql = "UPDATE usuarios SET u_identificacion ='$u_identificacion', u_nombresrazon='$u_nombresrazon', u_celular='$u_celular', u_correo = '$u_correo' , u_contrasena='$u_contrasena' WHERE u_id = $u_id ";
        $resultado = $conexion->InsActElim($sql);
        $conexion->Desconectar();
        return $resultado;

    }
}

?>
