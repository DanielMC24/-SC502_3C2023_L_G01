<?php
require_once "global.php";

class Conexion
{
    function __construct()
    {
        # code...
    }
    public static function conectar(){
        //conexion mysql
        try {
            $cn = new PDO("mysql:host=".DB_HOST_MYSQL.";dbname=".DB_NAME_MYSQL.";charset=utf8",DB_USER_MYSQL,DB_PASSWORD_MYSQL);
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cn;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}

//var_dump(Conexion::conectar());