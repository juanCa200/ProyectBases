<?php
require_once '../controllers/controllerGeneral.php';
$inscripcion = new controllerGeneral();
$inscripcion->InscripcionPorCurso($_POST['cod_est'],$_POST['curso'],$_POST['periodo'],$_POST['anio']);
?>