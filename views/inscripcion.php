<!--Llamamos el metodo obtener estudiantes y obtener cursos de la clase control general
    Esto se hace para mostrar los datos en pantalla que vienen de la base de datos-->
<?php
require_once "../controllers/controllerGeneral.php";
    $obj=new controllerGeneral();
    $cursos=$obj->getAllcursos();
    $est=$obj->getAllestudiantes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Menú Lateral</title>
  
  <!--Codigo 100% CSS  Nada de Boostrap-->
  <style>

body{
      font-family: Arial, sans-serif;

}
.form-group {
      margin-bottom: 20px;
}

label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
}

select, input[type="text"], input[type="date"] {
        width: 200px;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
}
  
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
      <h2 class="page-title" style="color: #007bff; font-size: 28px; margin-bottom: 10px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">Formulario de Inscripcion</h2>
      <p class="page-description" style="color: #666; font-size: 16px;">Completa el formulario de Inscripcion de estudiantes para cursos.</p>
    </div>
      <div class="row row-cols-1 g-4">
            
      <form action="inscripcionProcesado.php" method="POST" style="max-width: 500px; margin: 0 auto; background-color: #f2f2f2; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif;">
  <div style="display: flex; flex-wrap: wrap; gap: 30px;">
    <div style="flex: 1;">
      <div style="margin-bottom: 30px;">
        <label for="periodo" style="font-size: 1.3rem; color: #333; display: block; margin-bottom: 5px;">Periodo:</label>
        <select id="periodo" name="periodo" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; width: 100%;">
          <option value="1">Periodo 1</option>
          <option value="2">Periodo 2</option>
        </select>
      </div>

      <div style="margin-bottom: 30px;">
        <label for="anio" style="font-size: 1.3rem; color: #333; display: block; margin-bottom: 5px;">Año:</label>
        <input type="text" id="year" name="anio" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; width: 100%;">
      </div>
    </div>

    <div style="flex: 1;">
      <div style="margin-bottom: 30px;">
        <label for="curso" style="font-size: 1.3rem; color: #333; display: block; margin-bottom: 5px;">Curso:</label>
        <select id="curso" name="curso" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; width: 100%;">
          <?php foreach($cursos as $curso): ?>
            <option value="<?=$curso[0] ?>"><?= $curso[1] ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div style="margin-bottom: 30px;">
        <label for="cod_est" style="font-size: 1.3rem; color: #333; display: block; margin-bottom: 5px;">Código Estudiante:</label>
        <input type="text" id="cod_est" name="cod_est" style="padding: 10px; border-radius: 5px; border: 1px solid #ccc; width: 100%;">
      </div>
    </div>
  </div>

  <div style="text-align: center; margin-top: 20px;">
    <input type="submit" value="Enviar" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 1.3rem;">
  </div>
</form>

<hr style="border: none; border-top: 1px dashed #ccc; margin: 40px 0;">


 <div style="background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
        <h3 style="color: #333; font-family: Arial, sans-serif; font-size: 18px; margin-bottom: 6px;">Información Importante</h3>
        <p style="color: #666; font-size: 16px;">Recuerda completar todos los campos obligatorios en el formulario de Inscripcion. Si tienes alguna pregunta, no dudes en contactarnos.</p>
      </div>
<br>
 <footer class="footer" style="background-color: #333; color: #fff; padding: 20px; text-align: center; font-size: 14px;">
    <div class="container">
      <p>© 2023 Mi Sitio. Todos los derechos reservados.</p>
    </div>
  </footer>
      </div>
    </div>
  </main>
</body>
</html>
