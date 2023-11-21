<?php
require_once '../config/Conexion.php';

class Solicitud extends Conexion
{
    /*=============================================
	=            Atributos de la Clase            =
	=============================================*/
        protected static $cnx;
		private $id=null;
		private $idusuario=null;
		private $idservicio= null;
		private $adjunto= null;
        private $idestado=null;
	/*=====  End of Atributos de la Clase  ======*/

    /*=============================================
	=            Contructores de la Clase          =
	=============================================*/
        public function __construct(){}
    /*=====  End of Contructores de la Clase  ======*/

    /*=============================================
	=            Encapsuladores de la Clase       =
	=============================================*/
        public function getId()
        {
            return $this->id;
        }
        public function setId($id)
        {
            $this->id = $id;
        }
        public function getIdUsuario()
        {
            return $this->idusuario;
        }
        public function setIdUsuario($idusuario)
        {
            $this->idusuario = $idusuario;
        }
        public function getIdServicio()
        {
            return $this->idservicio;
        }
        public function setIdServicio($idservicio)
        {
            $this->idservicio = $idservicio;
        }
        public function setAdjunto($adjunto)
        {
            $this->adjunto = $adjunto;
        }
        public function getAdjunto()
        {
            return $this->adjunto;
        }
        public function getIdEstado()
        {
            return $this->idestado;
        }
        public function setIdEstado($idestado)
        {
            $this->idestado = $idestado;
        }
    /*=====  End of Encapsuladores de la Clase  ======*/

    /*=============================================
	=            Metodos de la Clase              =
	=============================================*/
        public static function getConexion(){
            self::$cnx = Conexion::conectar();
        }

        public static function desconectar(){
            self::$cnx = null;
        }

        public function listarTodosDb(){
            $query = "SELECT * FROM solicitud";
            $arr = array();
            try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->execute();
                self::desconectar();
                foreach ($resultado->fetchAll() as $encontrado) {
                    $solicitud = new Solicitud();
                    $solicitud->setId($encontrado['ID_Solicitud']);
                    $solicitud->setIdUsuario($encontrado['ID_Usuario']);
                    $solicitud->setIdServicio($encontrado['ID_Servicio']);
                    $solicitud->setAdjunto($encontrado['Adjunto']);
                    $solicitud->setIdEstado($encontrado['ID_Estado']);
                    $arr[] = $solicitud;
                }
                return $arr;
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
                return json_encode($error);
            }
        }

        /*
        public function verificarExistenciaDb(){
            $query = "SELECT * FROM solicitud where email=:email";
         try {
             self::getConexion();
                $resultado = self::$cnx->prepare($query);		
                $email= $this->getEmail();	
                $resultado->bindParam(":email",$email,PDO::PARAM_STR);
                $resultado->execute();
                self::desconectar();
                $encontrado = false;
                foreach ($resultado->fetchAll() as $reg) {
                    $encontrado = true;
                }
                return $encontrado;
               } catch (PDOException $Exception) {
                   self::desconectar();
                   $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                 return $error;
               }
        }*/

        public function guardarEnDb(){
            $query = "INSERT INTO `solicitud`(`ID_Usuario`, `ID_Servicio`, `Adjunto`, `ID_Estado`) VALUES (:idusuario,:idservicio,:adjunto,:idestado)";
         try {
             self::getConexion();
             $idusuario=$this->getIdUsuario();
             $idservicio=$this->getIdServicio();
             $adjunto=$this->getAdjunto();
             $idestado=$this->getIdEstado();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idusuario",$idusuario,PDO::PARAM_STR);
            $resultado->bindParam(":idservicio",$idservicio,PDO::PARAM_STR);
            $resultado->bindParam(":adjunto",$adjunto,PDO::PARAM_STR);
            $resultado->bindParam(":idestado",$idestado,PDO::PARAM_STR);
                $resultado->execute();
                self::desconectar();
               } catch (PDOException $Exception) {
                   self::desconectar();
                   $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
                 return json_encode($error);
               }
        }

        /*
        public function activar(){
            $id = $this->getId();
            $query = "UPDATE usuarios SET estado='1' WHERE id=:id";
           try {
             self::getConexion();
              $resultado = self::$cnx->prepare($query);
              $resultado->bindParam(":id",$id,PDO::PARAM_INT);
              self::$cnx->beginTransaction();//desactiva el autocommit
              $resultado->execute();
              self::$cnx->commit();//realiza el commit y vuelve al modo autocommit
              self::desconectar();
              return $resultado->rowCount();
             } catch (PDOException $Exception) {
               self::$cnx->rollBack();
               self::desconectar();
               $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
               return $error;
             }
        }

        public function desactivar(){
            $id = $this->getId();
            $query = "UPDATE usuarios SET estado='0' WHERE id=:id";
            try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id",$id,PDO::PARAM_INT);
            self::$cnx->beginTransaction();//desactiva el autocommit
            $resultado->execute();
            self::$cnx->commit();//realiza el commit y vuelve al modo autocommit
            self::desconectar();
            return $resultado->rowCount();
            } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
            }
        }

        */
        public static function mostrar($solicitud){
            $query = "SELECT * FROM solicitud where ID_Solicitud=:id";
            $id = $solicitud;
            try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":id",$id,PDO::PARAM_STR);
                $resultado->execute();
                self::desconectar();
                return $resultado->fetch();
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                return $error;
            }
    
        }

        public function llenarCampos($id){
            $query = "SELECT * FROM solicitud where id=:id";
            try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);		 	
            $resultado->bindParam(":id",$id,PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setIdServicio($encontrado['ID_Solicitud']);
                $this->setIdUsuario($encontrado['ID_Usuario']);
                $this->setIdServicio($encontrado['ID_Servicio']);
                $this->setAdjunto($encontrado['Adjunto']);
                $this->setIdEstado($encontrado['ID_Servicio']);
            }
            } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();;
            return json_encode($error);
            }
        }

        public function actualizarSolicitud(){
            $query = "update solicitud set ID_Estado=:estado where ID_Servicio=:id";
            try {
                self::getConexion();
                $id=$this->getIdServicio();
                $idestado=$this->getIdEstado();
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":estado",$idestado,PDO::PARAM_STR);
                $resultado->bindParam(":id",$id,PDO::PARAM_INT);
                self::$cnx->beginTransaction();//desactiva el autocommit
                $resultado->execute();
                self::$cnx->commit();//realiza el commit y vuelve al modo autocommit
                self::desconectar();
                return $resultado->rowCount();
            } catch (PDOException $Exception) {
                self::$cnx->rollBack();
                self::desconectar();
                $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                return $error;
            }
        }
        /*
        public function verificarExistenciaEmail(){
            $query = "SELECT email,id,nombre,telefono FROM usuarios where email=:email and estado =1";
            try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);		
            $email= $this->getEmail();		
            $resultado->bindParam(":email",$email,PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            $encontrado = false;
            $arr=array();
            foreach ($resultado->fetchAll() as $reg) {
                $arr[]=$reg['id'];
                $arr[]=$reg['email'];   
                $arr[]=$reg['nombre'];  
                $arr[]=$reg['telefono'];  
            }
            return $arr;
            return $encontrado;
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
            }
        }*/
    /*=====  End of Metodos de la Clase  ======*/  
}
?>