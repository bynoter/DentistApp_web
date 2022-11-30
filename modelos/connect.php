<?php
class Connect{
    
/*============================================
Informacion de la base de datos
============================================*/
    static public function infoDatabase(){
        $infoDB=array(
            "database"=>"dentistapp",
            "user"=>"root",
            "password" =>"ti.UTSEM"
        );
        return $infoDB;
    }
/*============================================
conexion a la base de datos
============================================*/
    public static function connection(){
        try {
            $connection=new PDO("mysql:host=localhost;dbname=".Connect::infoDatabase()["database"],
            Connect::infoDatabase()["user"],
            Connect::infoDatabase()["password"]);

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->exec("SET names utf8");
        } catch (Exception $e) {
            die("Error " . $e->getMessage());
            echo "Linea del error". $e->getLine();
        }
        
        return $connection;
        
    }
    
}