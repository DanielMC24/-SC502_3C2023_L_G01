<?php
require_once '../config/Conexion.php';

class Servicio extends Conexion
{
    /*=============================================
	=            Atributos de la Clase            =
	=============================================*/
        protected static $cnx;
		private $id=null;
		private $idtipo=null;
		private $idmodalidad= null;
		private $idusuario= null;
        private $ubicacion=null;
		private $titulo=null;
		private $descripcion= null;
		private $fecha= null;
        private $estado= null;
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
        public function getIdTipo()
        {
            return $this->idtipo;
        }
        public function setIdTipo($idtipo)
        {
            $this->idtipo = $idtipo;
        }
        public function getIdModalidad()
        {
            return $this->idmodalidad;
        }
        public function setIdModalidad($idmodalidad)
        {
            $this->idmodalidad = $idmodalidad;
        }
        public function setIdUsuario($idusuario)
        {
            $this->idusuario = $idusuario;
        }
        public function getIdUsuario()
        {
            return $this->idusuario;
        }
        public function getUbicacion()
        {
            return $this->ubicacion;
        }
        public function setUbicacion($ubicacion)
        {
            $this->ubicacion = $ubicacion;
        }
        public function getTitulo()
        {
            return $this->titulo;
        }
        public function setTitulo($titulo)
        {
            $this->titulo = $titulo;
        }
        public function getDescripcion()
        {
            return $this->descripcion;
        }
        public function setDescripcion($descripcion)
        {
            $this->descripcion = $descripcion;
        }
        public function getFecha()
        {
            return $this->fecha;
        }
        public function setFecha($fecha)
        {
            $this->fecha = $fecha;
        }
        public function getEstado()
        {
            return $this->estado;
        }
        public function setEstado($estado)
        {
            $this->estado = $estado;
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
            $query = "SELECT * FROM servicios";
            $arr = array();
            try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->execute();
                self::desconectar();
                foreach ($resultado->fetchAll() as $encontrado) {
                    $servicio = new Servicio();
                    $servicio->setId($encontrado['ID_Servicio']);
                    $servicio->setIdTipo($encontrado['ID_Tipo']);
                    $servicio->setIdModalidad($encontrado['ID_Modalidad']);
                    $servicio->setIdUsuario($encontrado['ID_Usuario']);
                    $servicio->setUbicacion($encontrado['Ubicacion']);
                    $servicio->setTitulo($encontrado['Titulo']);
                    $servicio->setDescripcion($encontrado['Descripcion']);
                    $servicio->setFecha($encontrado['Fecha']);
                    $servicio->setEstado($encontrado['Estado']);
                    $arr[] = $servicio;
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
        }*/

        public function guardarEnDb(){
            $query = "INSERT INTO `servicios`(`ID_Tipo`, `ID_Modalidad`, `ID_Usuario`, `Ubicacion`, `Titulo`, `Descripcion`, `Fecha`, `Estado`) VALUES (:idtipo,:idusuario,:ubicacion,:titulo,:descripcion,:fecha,:estado,now())";
         try {
             self::getConexion();
             $idtipo=$this->getIdTipo();
             $idusuario=$this->getIdUsuario();
             $ubicacion=$this->getUbicacion();
             $titulo=$this->getTitulo();
             $descripcion=$this->getDescripcion();
             $fecha=$this->getFecha();
             $estado=$this->getEstado();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idtipo",$idtipo,PDO::PARAM_INT);
            $resultado->bindParam(":idusuario",$idusuario,PDO::PARAM_INT);
            $resultado->bindParam(":ubicacion",$ubicacion,PDO::PARAM_STR);
            $resultado->bindParam(":titulo",$titulo,PDO::PARAM_STR);
            $resultado->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);
            $resultado->bindParam(":fecha",$fecha,PDO::PARAM_INT);
            $resultado->bindParam(":estado",$estado,PDO::PARAM_INT);
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
        }*/

        public static function mostrar($idServicio){
            $query = "SELECT * FROM servicios where ID_Servicio=:id";
            $id = $idServicio;
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

        /*
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
        }*/

        public function actualizarServicio(){
            $query = "update servicios set ID_Tipo=:idtipo, ID_Modalidad=:idmodalidad, ID_Usuario=:idusuario, Ubicacion=:ubicacion, Titulo=:titulo, Descripcion=:descripcion, Fecha=:fecha, Estado=:estado where id=:id";
            try {
                self::getConexion();
                $id=$this->getId();
                $idtipo=$this->getIdTipo();
                $idmodalidad=$this->getIdModalidad();
                $idusuario=$this->getIdUsuario();
                $ubicacion=$this->getUbicacion();
                $titulo=$this->getTitulo();
                $descripcion=$this->getDescripcion();
                $fecha=$this->getFecha();
                $estado=$this->getEstado();
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":idtipo",$idtipo,PDO::PARAM_INT);
                $resultado->bindParam(":idmodalidad",$idmodalidad,PDO::PARAM_INT);
                $resultado->bindParam(":idusuario",$idusuario,PDO::PARAM_INT);
                $resultado->bindParam(":ubicacion",$ubicacion,PDO::PARAM_STR);
                $resultado->bindParam(":titulo",$titulo,PDO::PARAM_STR);
                $resultado->bindParam(":nombre",$nombre,PDO::PARAM_STR);
                $resultado->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);
                $resultado->bindParam(":fecha",$fecha,PDO::PARAM_STR);
                $resultado->bindParam(":estado",$estado,PDO::PARAM_STR);
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
        
    /*=====  End of Metodos de la Clase  ======*/  
}
?>