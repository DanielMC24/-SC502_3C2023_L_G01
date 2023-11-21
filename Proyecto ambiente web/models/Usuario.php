<?php
require_once '../config/Conexion.php';

class Usuario extends Conexion
{
    /*=============================================
	=            Atributos de la Clase            =
	=============================================*/
        protected static $cnx;
		private $id=null;
		private $email=null;
		private $nombre= null;
		private $clave= null;
        private $imagen=null;
		private $telefono=null;
		private $estado= null;
		private $cambioContrasena= null;
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
        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function getNombre()
        {
            return $this->nombre;
        }
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        public function setClave($clave)
        {
            $this->clave = $clave;
        }
        public function getClave()
        {
            return $this->clave;
        }
        public function getImagen()
        {
            return $this->imagen;
        }
        public function setImagen($imagen)
        {
            $this->imagen = $imagen;
        }
        public function getTelefono()
        {
            return $this->telefono;
        }
        public function setTelefono($telefono)
        {
            $this->telefono = $telefono;
        }
        public function getEstado()
        {
            return $this->estado;
        }
        public function setEstado($estado)
        {
            $this->estado = $estado;
        }
        public function getCambioContrasena()
        {
            return $this->cambioContrasena;
        }
        public function setCambioContrasena($cambioContrasena)
        {
            $this->cambioContrasena = $cambioContrasena;
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
            $query = "SELECT * FROM usuarios";
            $arr = array();
            try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->execute();
                self::desconectar();
                foreach ($resultado->fetchAll() as $encontrado) {
                    $user = new Usuario();
                    $user->setId($encontrado['id']);
                    $user->setEmail($encontrado['email']);
                    $user->setNombre($encontrado['nombre']);
                    $user->setImagen($encontrado['imagen']);
                    $user->setTelefono($encontrado['telefono']);
                    $user->setEstado($encontrado['estado']);
                    $arr[] = $user;
                }
                return $arr;
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
                return json_encode($error);
            }
        }

        public function verificarExistenciaDb(){
            $query = "SELECT * FROM usuarios where email=:email";
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
        }

        public function guardarEnDb(){
            $query = "INSERT INTO `usuarios`(`email`, `nombre`, `clave`, `imagen`, `telefono`, `estado`, `cambioContrasena`, `created_at`) VALUES (:email,:nombre,:clave,:imagen,:telefono,:estado,:cambioContrasena,now())";
         try {
             self::getConexion();
             $email=$this->getEmail();
             $nombre=strtoupper($this->getNombre());
             $clave=$this->getClave();
             $imagen=$this->getImagen();
             $telefono=$this->getTelefono();
             $estado=$this->getEstado();
             $cambioContrasena=$this->getCambioContrasena();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":email",$email,PDO::PARAM_STR);
            $resultado->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $resultado->bindParam(":clave",$clave,PDO::PARAM_STR);
            $resultado->bindParam(":imagen",$imagen,PDO::PARAM_STR);
            $resultado->bindParam(":telefono",$telefono,PDO::PARAM_STR);
            $resultado->bindParam(":estado",$estado,PDO::PARAM_INT);
            $resultado->bindParam(":cambioContrasena",$cambioContrasena,PDO::PARAM_INT);
                $resultado->execute();
                self::desconectar();
               } catch (PDOException $Exception) {
                   self::desconectar();
                   $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
                 return json_encode($error);
               }
        }

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

        public static function mostrar($correo){
            $query = "SELECT * FROM usuarios where email=:id";
            $id = $correo;
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
            $query = "SELECT * FROM usuarios where id=:id";
            try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);		 	
            $resultado->bindParam(":id",$id,PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setId($encontrado['id']);
                $this->setNombre($encontrado['nombre']);
                $this->setEstado($encontrado['estado']);
            }
            } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();;
            return json_encode($error);
            }
        }

        public function actualizarUsuario(){
            $query = "update usuarios set nombre=:nombre,telefono=:telefono where id=:id and email=:email";
            try {
                self::getConexion();
                $id=$this->getId();
                $email=$this->getEmail();
                $nombre=$this->getNombre();
                $telefono=$this->getTelefono();
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":email",$email,PDO::PARAM_STR);
                $resultado->bindParam(":nombre",$nombre,PDO::PARAM_STR);
                $resultado->bindParam(":telefono",$telefono,PDO::PARAM_STR);
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
        }
    /*=====  End of Metodos de la Clase  ======*/  
}
?>