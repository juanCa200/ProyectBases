<?php
 class CConexion{
    public static function ConexionBD(){
        $host='localhost';
<<<<<<< HEAD
        $dbname='dbphp';
        $username='juanito';
        $pasword='123456';
=======
        $dbname='notas';
        $username='postgres';
        $pasword='postgres';
>>>>>>> 66d682c (a)
    try{
        $conn = new PDO("pgsql:host=$host; dbname=$dbname", $username, $pasword);
    }catch(PDOException $exp){
        echo("No se puede conectar a la base de datos");
    }
      return $conn;
    }
 }