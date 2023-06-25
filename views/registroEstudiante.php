<?php
require_once '../controllers/controllerGeneral.php';
$obj = new controllerGeneral();

try {
    $obj->saveEstudiantes($_POST['cod_est'],$_POST['nomb_est']);
} catch (PDOException $error) {
    echo"no pudo registrar el estudiante, la razón es: ".$error->getMessage();
}
?>

<input type='button'  name='Volver Atrás' value='Volver Atrás' onclick=location.href='http://localhost/app/views/registro.php'><br>