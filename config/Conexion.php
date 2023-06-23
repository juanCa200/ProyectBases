<?php
 class CConexion{
    public static function ConexionBD(){
        $host='localhost';
        $dbname='dbphp';
        $username='juanito';
        $pasword='123456';
    try{
        $conn = new PDO("pgsql:host=$host; dbname=$dbname", $username, $pasword);
    }catch(PDOException $exp){
        echo("No se puede conectar a la base de datos");
    }
      return $conn;
    }
 }