<?php
 class CConexion{
    public static function ConexionBD(){
        $host='localhost';
<<<<<<< HEAD

        $dbname='notas';
        $username='postgres';
        $pasword='postgres';

=======
        $dbname='notas';
        $username='postgres';
        $pasword='postgres';
>>>>>>> e47f33998ea26e46b912d136fc1b8db18e437aed
    try{
        $conn = new PDO("pgsql:host=$host; dbname=$dbname", $username, $pasword);
    }catch(PDOException $exp){
        echo("No se puede conectar a la base de datos, error: ". $exp->getMessage());
    }
      return $conn;
    }
 }