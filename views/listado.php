<!--Llamamos el metodo obtener estudiantes de la clase control general
    Esto se hace para mostrar los datos en pantalla que vienen de la base de datos-->
<?php
require_once "../controllers/controllerGeneral.php";
    $obj=new controllerGeneral();
    
    
    $date = getdate();
    echo"<p>".$date['mday']."/".$date['month']."/".$date['year']."</p>";

    /*
    $nomb_cur = $obj->get_nomb_cur($cod_cur);
    echo "curso: ".$nomb_cur."<br><br>";
    */
    $estudiantes = $obj->getEstudiantes($_POST['cod_cur'],$_POST['year'],$_POST['periodo']);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Menú</title>
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
.table-container {
  margin-bottom: 20px;
}

.data-table {
  width: 100%;
  border-collapse: collapse;
}

.data-table th,
.data-table td {
  padding: 8px;
  border: 1px solid #ccc;
}

.pagination-container {
  text-align: center;
  margin-top: 10px;
}

.pagination-container button {
  margin: 0 5px;
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
      <h2 class="page-title" style="font-family: Arial, sans-serif; font-size:2rem" >Listado de Estudiantes</h2>
      <br>
      <div class="row row-cols-1 g-4">
      
<div class="table-container">
  <table class="data-table">
    <thead>
      <tr>
        <th style="background-color:E0D9D9">Cod_est</th>
        <th style="background-color:E0D9D9">Nombre</th>
        <th style="background-color:E0D9D9">Eliminar</th>
      </tr>
    </thead>
    <tbody>
    <?php if($estudiantes): ?>
      <?php foreach($estudiantes as $estu):?>
      <tr> <td><?=$estu[0]?></td>
       <td><?=$estu[1]?></td>
       <td><form action="eliminar.php" method="POST">
          <input type="hidden" name="cod_est" value="<?=$estu[0]?>">
      <center><button type="submit" style="padding-top:15px; border: none; background: none;"><i class="fa-solid fa-delete-left fa-2xl" style="color: #d91717;"></i></button></center>
        </form></td></tr> 
       <?php endforeach; ?>
       <?php else:  ?>
          <tr>
                <td colspan="3" style="text-align:center">NO HAY REGISTROS</td>
            </tr>
        <?php endif; ?>
    </tbody>
  </table>
</div>
 <br><br><br>
      </div>
    </div>
  </main>
<br><br><br>

</body>
</html>
