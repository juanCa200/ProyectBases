<?php
require_once '../controllers/controllerGeneral.php';
$obj = new controllerGeneral();
$obj->eliminarEstudiantes($_POST['cod_est']);
?>