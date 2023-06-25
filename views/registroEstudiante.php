<?php
require_once '../controllers/controllerGeneral.php';
$obj = new controllerGeneral();
$obj->saveEstudiantes($_POST['cod_est'],$_POST['nomb_est']);
?>