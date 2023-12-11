<?php
class ConexionBD {
  private static $dbName = 'imas' ; 
  private static $dbHost = 'localhost'; // host lo mismo para ambos mysql y postgret
  private static $dbUsername = 'root'; // postgret: PostgreSQl 9.3 y myslq: root
  private static $dbUserPassword = ''; //POSTGRET : p05gr3t y mysql : ''
  private static $dbPort = '3306'; // POSTGRET:  5432 y MYSQl: 3306
  private static $dbMotor = 'mysql'; // pgsql y mysq
  private static $cont  = null;
  
  public function __construct() {
    exit('Init function is not allowed');
  }
  
  public static function conectar()
  {
     // One connection through whole application
       if ( null == self::$cont )
       {      
        try 
        {

       self::$cont =  new PDO( "".self::$dbMotor.":host=".self::$dbHost."; "."port=".self::$dbPort."; "."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);  // MYSQL POSGRET

        }
        catch(PDOException $e) 
        {
          die($e->getMessage());  
        }
       } 
       return self::$cont;
  }
  
  public static function desconectar()
  {
    self::$cont = null;
  }
}
?>