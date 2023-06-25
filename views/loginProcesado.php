<?php
require_once '../controllers/controllerLogin.php';
$login = new controllerLogin();
$login->LoginUsuario($_POST['usuario'],$_POST['password']);
?>