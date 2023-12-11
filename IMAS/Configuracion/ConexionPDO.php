<?php

class ConexionPDO {

    private static $dbName = 'imas';
    private static $dbHost = 'localhost'; // host lo mismo para ambos mysql y postgret
    private static $dbUsername = 'root'; // postgret: PostgreSQl 9.3 y myslq: root
    private static $dbUserPassword = ''; //POSTGRET : p05gr3t y mysql : ''
    private static $dbPort = '3306'; // POSTGRET:  5432 y MYSQl: 3306
    private static $dbMotor = 'mysql'; // pgsql y mysq
    private static $cont = null;
    public $BD;

    public function __construct() {
        
    }

    public function Conectar() {        // One connection through whole application
        // One connection through whole application
        if (null == self::$cont) {
            try {

                self::$cont = new PDO("" . self::$dbMotor . ":host=" . self::$dbHost . "; " . "port=" . self::$dbPort . "; " . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);  // MYSQL POSGRET
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function Desconectar() {
        self::$cont = null;
    }

    public function consultarRegistro($query) {
        $pdo = $this->Conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $consulta = $pdo->query($query);
            if ($consulta->rowCount() == 1) {
                return $consulta;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    
     public function CantidadRegistro($query) {
        $pdo = $this->Conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $consulta = $pdo->query($query);
            if ($consulta->rowCount() >= 1) {
                return $consulta->rowCount();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    
    public function obtenerTodos($query) {
        $pdo = $this->Conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            return $pdo->query($query);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function InsActElim($sql) {
        $pdo = $this->Conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {           
            $ejecutar = $pdo->prepare($sql);
            return $ejecutar->execute();            
        } catch (PDOException $e) {
           return false;
            echo $e->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}

?>