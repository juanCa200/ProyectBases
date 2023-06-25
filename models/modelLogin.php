<?php
/* Esto es para que muestre los Errores en pantalla, cuando tenga */
ini_set('display_errors', 'On');
error_reporting(E_ALL);

class modelLogin {
    private $conn;

    public function __construct() {
        require_once '/opt/lampp/htdocs/app/config/Conexion.php';
        $this->conn = CConexion::ConexionBD();
    }

    //Validamos que el usuario sea Reyes, SIUUUUU
    public function IngresarUsuario($user, $password) {
        return ($user==="reyes" && $password==="160004728");
    }

}

#borrar