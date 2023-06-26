<?php
require_once '../controllers/controllerGeneral.php';
$obj = new controllerGeneral();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Menú Lateral</title>
  <style>
  
  body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;

}

.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  width: 240px;
  height: 100vh;
  background-color: #333;
  color: #fff;
  overflow-y: auto;
  transition: all 0.3s ease-in-out;
}

.sidebar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  border-bottom: 1px solid #555;
}

.sidebar h2 {
  margin: 0;
  font-size: 1.5rem;
}


.menu {
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu li {
  margin-bottom: 10px;
}

.menu a {
  color: #fff;
  text-decoration: none;
  padding: 10px;
  display: block;
  transition: background-color 0.3s ease-in-out;
}

.menu a:hover {
  background-color: #555;
}

.content {
  margin-left: 240px;
  padding: 20px;
}
</style>
</head>
<body>
  <div class="sidebar">
    <div class="sidebar-header">
      <h2>Registro<br>de Notas<br><?php $date = getdate(); echo"<p>".$date['mday']."/".$date['month']."/".$date['year']."</p>";?></h2>
    </div>
    <ul class="menu">
      <li><a href="/app/views/SelectCurso.php"><i class="fa-solid fa-sitemap"></i></i>  Listados</a></li>
      <li><a href="/app/views/inscripcion.php"><i class="fa-solid fa-plus"></i>  Inscripcion</a></li>
      <li><a href="/app/views/registro.php"><i class="fa-solid fa-plus"></i>  Registro</a></li>
      <li><a href="/app/views/planeacion.php"><i class="fa-solid fa-clipboard"></i>  Notas</a></li>
      <li><a href="/app/views/reporte.php"><i class="fa-solid fa-clipboard"></i>  Reporte</a></li>
    </ul>
  </div>
  <main class="content">
  <div class="container">
  <div style="text-align: center;">
      <h2 class="page-title" style="color: #007bff; font-size: 28px; margin-bottom: 10px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">Formulario de Registro de Estudiantes</h2>
      <p class="page-description" style="color: #666; font-size: 16px;">Completa el formulario de registro para agregar un nuevo estudiante.</p>
    </div>
    <div class="row row-cols-1 g-4">

    <?php if(isset($_POST['submit'])):?>
<?php 

if (intval($_POST['cod_est']) > 0 && $obj->validarCodEst($_POST['cod_est']) == false) {

    $obj->saveEstudiantes($_POST['cod_est'],$_POST['nomb_est']);
    echo"Registro Exitoso!";
}
else if (intval($_POST['cod_est']) <= 0) {
  echo  "Ingrese un codigo valido por favor";
}
else if ($obj->validarCodEst($_POST['cod_est'])) {
  echo  "Ya existe un estudiante con ese codigo";
}
else{
  echo  "Los datos son incorrectos, ingreselos nuevamente por favor";
}


?>
<?php endif; ?>

      <form action="registro.php" method="POST" style="max-width: 400px; margin: 0 auto; background-color: #eef2f5; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
        <h2 style="text-align: center; margin-bottom: 20px; color: #333; font-family: Arial, sans-serif;">Formulario Estudiantil</h2>
        <div style="margin-bottom: 20px;">
          <input name="cod_est" type="text" placeholder="Código Estudiantil" required style="width: 100%; padding: 10px; border: none; border-bottom: 2px solid #007bff; background-color: #eef2f5; color: #333; font-size: 16px;" required>
        </div>
        <div style="margin-bottom: 20px;">
          <input name="nomb_est" type="text" placeholder="Nombre del Estudiante" required style="width: 100%; padding: 10px; border: none; border-bottom: 2px solid #007bff; background-color: #eef2f5; color: #333; font-size: 16px;" required>
        </div>
        <button type="submit" name="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 3px; cursor: pointer; font-size: 16px;">Enviar</button>
      </form>
                


      <!-- Agregar una línea decorativa -->
      <hr style="border: none; border-top: 1px dashed #ccc; margin: 40px 0;">

      <!-- Agregar una tarjeta informativa -->
      <div style="background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
        <h3 style="color: #333; font-family: Arial, sans-serif; font-size: 18px; margin-bottom: 10px;">Información Importante</h3>
        <p style="color: #666; font-size: 16px;">Recuerda completar todos los campos obligatorios en el formulario de registro. Si tienes alguna pregunta, no dudes en contactarnos.</p>
      </div>

    </div>
  </div>

  <br><br>
  <footer class="footer" style="background-color: #333; color: #fff; padding: 20px; text-align: center; font-size: 14px;">
    <div class="container">
      <p>© 2023 Mi Sitio. Todos los derechos reservados.</p>
    </div>
  </footer>
</main>



</body>
</html>