<?php
 class CConexion{
    public static function ConexionBD(){
        $host='localhost';
        $dbname='notas';
        $username='postgres';
        $pasword='postgres';
    try{
        $conn = new PDO("pgsql:host=$host; dbname=$dbname", $username, $pasword);
    }catch(PDOException $exp){
        echo("No se puede conectar a la base de datos, error: ". $exp->getMessage());
    }
      return $conn;
    }
 }