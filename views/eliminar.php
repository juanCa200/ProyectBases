<?php
require_once '../controllers/controllerGeneral.php';
$obj = new controllerGeneral();
try {
    $obj->eliminarEstudiantes($_POST['cod_est']);
} catch (PDOException $error) {
    echo"no se puedo eliminar el estudiante, la razón es: ".$error->getMessage();
}
?>