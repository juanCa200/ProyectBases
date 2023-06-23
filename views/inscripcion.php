<!--Llamamos el metodo obtener estudiantes y obtener cursos de la clase control general
    Esto se hace para mostrar los datos en pantalla que vienen de la base de datos-->
<?php
require_once "/opt/lampp/htdocs/app/controllers/controllerGeneral.php";
    $obj=new controllerGeneral();
    $date=$obj->getAllcursos();
?>

<?php
require_once "/opt/lampp/htdocs/app/controllers/controllerGeneral.php";
    $obj=new controllerGeneral();
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
      <h2>Menú</h2>
    </div>
    <ul class="menu">
      <li><a href="/app/views/SelectCurso.php"><i class="fa-solid fa-sitemap"></i></i>  Seleccionar Curso</a></li>
      <li><a href="/app/views/inscripcion.php"><i class="fa-solid fa-plus"></i>  Inscripcion de estudiantes</a></li>
      <li><a href="/app/views/pagina_registro_Est.php"><i class="fa-solid fa-plus"></i>  Registro de estudiantes</a></li>
      <li><a href="/app/views/pagina_planeacion.php"><i class="fa-solid fa-clipboard"></i>  Planeacion</a></li>
      <li><a href="/app/views/pagina_calificaciones.php"><i class="fa-solid fa-plus"></i>  Calificaciones</a></li>
      <li><a href="#"><i class="fa-solid fa-clipboard"></i>  Reporte</a></li>
    </ul>
  </div>

  <main class="content">
    <div class="container">
      <h2 class="page-title" style="font-family: Arial, sans-serif; font-size:2rem" >Inscripcion estudiante por curso</h2>
      <br>
      <div class="row row-cols-1 g-4">
      
      
<form action="inscripcionProcesado.php" method="POST">
        <div class="form-group">
            <label for="periodo" style="font-family: Arial, sans-serif; font-size:1.3rem">Periodo:</label>
            <select id="periodo" name="periodo">
                <option style="font-family: Arial, sans-serif; font-size:1.0rem" value ="1">Periodo 1</option>
                <option style="font-family: Arial, sans-serif; font-size:1.0rem"  value ="2">Periodo 2</option>
    </select>
        </div>
        
        <div class="form-group">
            <label style="font-family: Arial, sans-serif; font-size:1.3rem" for="anio">Año:</label>
            <input type="text" id="year" name="anio">
        </div>
        
        <div class="form-group" >
            <label style="font-family: Arial, sans-serif; font-size:1.3rem" for="curso">Curso:</label>
            <select id="curso" name="curso">
            <?php foreach($date as $dates): ?>
                <option style="font-family: Arial, sans-serif; font-size:1.0rem"  value="<?=$dates[0] ?>"><?= $dates[1] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label style="font-family: Arial, sans-serif; font-size:1.3rem" for="anio">Codigo Estudiante:</label>
            <input type="text" id="cod_est" name="cod_est">
        </div>

        <input type="submit" value="Enviar">
</form>
 <br><br><br><br>
        <footer class="footer">
    <div class="container">
      <p>© 2023 Mi Sitio. Todos los derechos reservados.</p>
    </div>
  </footer>
      </div>
    </div>
  </main>
<br><br><br>
</body>
</html>
