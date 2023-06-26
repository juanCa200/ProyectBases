<?php
require_once '../controllers/controllerGeneral.php';
$obj = new controllerGeneral();
try {
    $obj->eliminarNota($_POST['cod_nota']);
    
} catch (PDOException $error) {
    echo"no se puedo eliminar la nota, la razón es: ".$error->getMessage();
}
?>